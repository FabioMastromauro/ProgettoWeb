package it.univaq.autovelox.fragment;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.RecyclerView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import it.univaq.autovelox.R;
import it.univaq.autovelox.database.DB;
import it.univaq.autovelox.entity.Autovelox;
import it.univaq.autovelox.utility.Request;

public class ListFragment extends Fragment {

    private RecyclerView recyclerView;
    private AutoveloxAdapter adapter;
    private List<Autovelox> data = new ArrayList<>();

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        return inflater.inflate(R.layout.fragment_list, container, false);
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        recyclerView = view.findViewById(R.id.recyclerView);
        adapter = new AutoveloxAdapter(data);
        recyclerView.setAdapter(adapter);


        if (data.size() == 0) {
            Request.getInstance(getContext()).getQueue("http://www.datiopen.it/export/json/Mappa-degli-autovelox-in-italia.json", new Request.OnCompleteCallback() {
                @Override
                public void onCompleted(JSONArray response) {

                    if(response == null){

                        readFromDB(data);

                    }else {

                        for (int i = 0; i < response.length(); i++) {
                            JSONObject object = response.optJSONObject(i);
                            if (object != null) {
                                data.add(Autovelox.parseAv(object));
                            }
                        }
                        adapter.notifyDataSetChanged();
                        writeToDB(data);
                    }
                }
            });
        }
    }

    private void writeToDB(List<Autovelox> data) {

        new Thread(() -> {
            DB.getInstance(requireContext()).autoveloxDao().save(data);
        }).start();
    }

    private void readFromDB(List<Autovelox> data) {

        new Thread(() -> {
            List<Autovelox> result = DB.getInstance(getContext()).autoveloxDao().findAll();
            data.addAll(result);
            requireActivity().runOnUiThread(() -> adapter.notifyDataSetChanged());
        }).start();
    }
}

