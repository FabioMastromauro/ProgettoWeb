package it.univaq.autovelox.utility;

import android.content.Context;

import com.android.volley.AsyncCache;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import android.widget.TextView;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import it.univaq.autovelox.entity.Autovelox;

public class Request {

    public interface OnCompleteCallback {
        void onCompleted(JSONArray response);
    }


    private RequestQueue queue;

    private static volatile Request instance = null;

    public static synchronized Request getInstance(Context context) {
        if (instance == null) {
            synchronized (Request.class) {
                if (instance == null) {
                    instance = new Request(context);
                }
            }
        }
        return instance;
    }

    private Request(Context context) {
        queue = Volley.newRequestQueue(context);
    }

    public void getQueue(String urlAddress, OnCompleteCallback callback) {

        JsonArrayRequest request = new JsonArrayRequest(urlAddress, new Response.Listener<JSONArray>() {

            @Override
            public void onResponse (JSONArray response) {
                if(callback != null) callback.onCompleted(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                if(callback != null) callback.onCompleted(null);
            }
        });
        queue.add(request);
    }

}
