package it.univaq.autovelox.entity;

import androidx.annotation.NonNull;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

import org.json.JSONObject;

import java.io.Serializable;

@Entity
public class Autovelox implements Serializable {

    @NonNull
    @PrimaryKey
    private String id;
    private String comune;
    private String provincia;
    private String regione;
    private String nome;
    private String anno_inserimento;
    private String data_ora_inserimento;
    private double longitudine;
    private double latitudine;

    public Autovelox() {}

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getComune() {
        return comune;
    }

    public void setComune(String comune) {
        this.comune = comune;
    }

    public String getProvincia() {
        return provincia;
    }

    public void setProvincia(String provincia) {
        this.provincia = provincia;
    }

    public String getRegione() {
        return regione;
    }

    public void setRegione(String regione) {
        this.regione = regione;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getAnno_inserimento() {
        return anno_inserimento;
    }

    public void setAnno_inserimento(String anno_inserimento) {
        this.anno_inserimento = anno_inserimento;
    }

    public String getData_ora_inserimento() {
        return data_ora_inserimento;
    }

    public void setData_ora_inserimento(String data_ora_inserimento) {
        this.data_ora_inserimento = data_ora_inserimento;
    }

    public double getLongitudine() {
        return longitudine;
    }

    public void setLongitudine(double longitudine) {
        this.longitudine = longitudine;
    }

    public double getLatitudine() {
        return latitudine;
    }

    public void setLatitudine(double latitudine) {
        this.latitudine = latitudine;
    }

    public static Autovelox parseAv(JSONObject item) {
        Autovelox av = new Autovelox();
        av.setComune(item.optString("ccomune"));
        av.setProvincia(item.optString("cprovincia"));
        av.setRegione(item.optString("cregione"));
        av.setNome(item.optString("cnome", "No name"));
        av.setAnno_inserimento(item.optString("canno_inserimento"));
        av.setData_ora_inserimento(item.optString("cdata_e_ora_inserimento"));
        av.setId(item.optString("cidentificatore_in_openstreetmap"));
        av.setLongitudine(item.optDouble("clongitudine"));
        av.setLatitudine(item.optDouble("clatitudine"));
        return av;
    }
}
