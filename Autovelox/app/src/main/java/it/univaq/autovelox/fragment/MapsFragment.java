package it.univaq.autovelox.fragment;

import android.location.Location;
import android.location.LocationListener;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.activity.result.ActivityResultCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.navigation.Navigation;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.LatLngBounds;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import java.util.ArrayList;
import java.util.List;

import it.univaq.autovelox.R;
import it.univaq.autovelox.database.DB;
import it.univaq.autovelox.entity.Autovelox;
import it.univaq.autovelox.utility.LocationHelper;

public class MapsFragment extends Fragment implements OnMapReadyCallback, LocationListener {

    private GoogleMap map;
    private Marker myMarker;
    private List<Marker> autoveloxMarker = new ArrayList<>();
    private int size;
    private ActivityResultLauncher<String> launcher = registerForActivityResult(
            new ActivityResultContracts.RequestPermission(),
            new ActivityResultCallback<Boolean>() {
                @Override
                public void onActivityResult(Boolean result) {
                    if (result) {
                        helper.Start(MapsFragment.this);
                    } else {
                        Toast.makeText(requireContext(), "Enable location to find autovelox near you", Toast.LENGTH_SHORT).show();
                    }
                }
            }
    );
    private LocationHelper helper;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        return inflater.inflate(R.layout.fragment_maps, container, false);
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        helper = new LocationHelper(requireContext(), launcher);
        SupportMapFragment fragment = (SupportMapFragment) getChildFragmentManager().findFragmentById(R.id.fragmentMap);
        if (fragment != null) {
            fragment.getMapAsync(this);
        }

    }

    @Override
    public void onStop() {
        super.onStop();
        helper.stop(this);
    }

    @Override
    public void onMapReady(@NonNull GoogleMap googleMap) {
        map = googleMap;
        map.setOnMarkerClickListener(new GoogleMap.OnMarkerClickListener() {
            @Override
            public boolean onMarkerClick(@NonNull Marker marker) {

                Autovelox av = (Autovelox) marker.getTag();
                if (av != null) {
                    Bundle bundle = new Bundle();
                    bundle.putSerializable("autovelox", av);
                    Navigation.findNavController(requireView()).navigate(R.id.action_navMap_to_detailActivity, bundle);
                    return true;
                }
                return false;
            }

        });
        helper.Start(this);
    }

    @Override
    public void onLocationChanged(@NonNull Location location) {

        load(location);
    }

    private void load(Location location) {

        addMyMarker(location);

        for (Marker m : autoveloxMarker) {
            m.remove(); // op che va fatta sul main thread
        }
        // lo faccio per fare lettura delle farmacie sul db
        new Thread(() -> {

            size = 0;
            LatLngBounds.Builder bounds = new LatLngBounds.Builder();
            List<Autovelox> avList = DB.getInstance(requireContext()).autoveloxDao().findAll();
            for (Autovelox autovelox : avList) {

                Location l = new Location("autovelox");
                l.setLongitude(autovelox.getLongitudine());
                l.setLatitude(autovelox.getLatitudine());

                if (l.distanceTo(location)>15000) continue;

                MarkerOptions options = new MarkerOptions();
                options.title(autovelox.getId());
                options.position(new LatLng(l.getLatitude(), l.getLongitude()));
                options.icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_AZURE));
                bounds.include(new LatLng(l.getLatitude(), l.getLongitude()));
                size ++;
                requireActivity().runOnUiThread(() -> {
                    Marker marker = map.addMarker(options);
                    marker.setTag(autovelox);
                    autoveloxMarker.add(marker);
                });
            }

            try {
                requireActivity().runOnUiThread(() -> {
                    // muove la camera sulla mia posizione
                    //map.animateCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(location.getLatitude(), location.getLongitude()), 11), 2000, null);

                    if (size > 0) {
                        map.animateCamera(CameraUpdateFactory.newLatLngBounds(bounds.build(), 50), 2000, null);
                    }
                });
            } catch (Exception e) {
                e.printStackTrace();
            }
        }).start();
    }

    private void addMyMarker(Location location) {

        if (myMarker == null) {
            MarkerOptions options = new MarkerOptions();
            options.title("MyLocation");
            options.position(new LatLng(location.getLatitude(), location.getLongitude()));
            options.icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_RED));
            myMarker = map.addMarker(options);
        } else {
            myMarker.setPosition(new LatLng(location.getLatitude(), location.getLongitude()));
        }
    }
}
