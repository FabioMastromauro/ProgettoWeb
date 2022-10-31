package it.univaq.autovelox.database;

import android.content.Context;

import androidx.room.Database;
import androidx.room.Room;
import androidx.room.RoomDatabase;

import it.univaq.autovelox.entity.Autovelox;

@Database(version = 1, entities = {Autovelox.class})
public abstract class DB extends RoomDatabase {

    private volatile static DB instance = null;

    public abstract AutoveloxDao autoveloxDao();

    public static synchronized  DB getInstance(Context context) {
        if (instance == null) {
            synchronized (DB.class) {
                if (instance == null) {
                    instance = Room.databaseBuilder(context, DB.class, "Database.db").build();
                }
            }
        }
        return instance;
    }
}
