package it.univaq.autovelox;

import android.os.Bundle;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import it.univaq.autovelox.entity.Autovelox;

public class DetailActivity extends AppCompatActivity {

    private Autovelox av;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        try {
            av = (Autovelox) getIntent().getSerializableExtra("autovelox");
        } catch (Exception e){
            e.printStackTrace();
            onBackPressed();
        }
        setupTextView();
    }

    private void setupTextView() {

        ((TextView) findViewById(R.id.nome)).setText("NOME: " + av.getNome());
        ((TextView) findViewById(R.id.comune)).setText("COMUNE: " + av.getComune());
        ((TextView) findViewById(R.id.provincia)).setText("PROVINCIA: " + av.getProvincia());
        ((TextView) findViewById(R.id.regione)).setText("REGIONE: " + av.getRegione());
        ((TextView) findViewById(R.id.longitudine)).setText("LONGITUDINE: " + String.valueOf(av.getLongitudine()));
        ((TextView) findViewById(R.id.latitudine)).setText("LATITUDINE: " + String.valueOf(av.getLatitudine()));
        ((TextView) findViewById(R.id.data_ora_inserimento)).setText("DATA E ORA DI INSERIMENTO: " + av.getData_ora_inserimento());
        ((TextView) findViewById(R.id.id)).setText("ID: " + av.getId());
    }
}
