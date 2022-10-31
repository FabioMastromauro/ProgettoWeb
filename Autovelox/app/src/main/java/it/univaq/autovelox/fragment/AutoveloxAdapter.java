package it.univaq.autovelox.fragment;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Adapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.navigation.Navigation;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

import it.univaq.autovelox.R;
import it.univaq.autovelox.entity.Autovelox;

public class AutoveloxAdapter extends RecyclerView.Adapter<AutoveloxAdapter.ViewHolder> {

    private final List<Autovelox> data;
    public AutoveloxAdapter(List<Autovelox> data) {
        this.data = data;
    }
    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        return new ViewHolder(LayoutInflater.from(parent.getContext()).inflate(R.layout.adapter_autovelox, parent, false));
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.onBind(data.get(position));
    }

    @Override
    public int getItemCount() {
        return data != null ? data.size() : 0;
    }

    public class ViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final TextView title;

        private final TextView subtitle;

        public ViewHolder(View view) {
            super(view);

            title = view.findViewById(R.id.textTitle);
            subtitle = view.findViewById(R.id.textSubtitle);

            view.findViewById(R.id.layoutRoot).setOnClickListener(this);
        }

        @Override
        public void onClick(View view) {

            Autovelox av = data.get(getAdapterPosition());
            Bundle bundle = new Bundle();
            bundle.putSerializable("autovelox", av);
            Navigation.findNavController(view).navigate(R.id.action_navList_to_detailActivity, bundle);
        }

        public void onBind(Autovelox av) {
            title.setText(av.getComune());
            subtitle.setText(av.getProvincia());
        }
    }
}
