package it.univaq.autovelox.database;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.OnConflictStrategy;
import androidx.room.Query;

import java.util.List;

import it.univaq.autovelox.entity.Autovelox;

@Dao
public interface AutoveloxDao {

    @Insert(onConflict = OnConflictStrategy.REPLACE)
    public void save(List<Autovelox> av);

    @Query("SELECT * FROM Autovelox ORDER BY id ASC")
    public List<Autovelox> findAll();
}
