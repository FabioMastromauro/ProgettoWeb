package it.univaq.autovelox.database;

import androidx.annotation.NonNull;
import androidx.room.DatabaseConfiguration;
import androidx.room.InvalidationTracker;
import androidx.room.RoomOpenHelper;
import androidx.room.RoomOpenHelper.Delegate;
import androidx.room.RoomOpenHelper.ValidationResult;
import androidx.room.migration.AutoMigrationSpec;
import androidx.room.migration.Migration;
import androidx.room.util.DBUtil;
import androidx.room.util.TableInfo;
import androidx.room.util.TableInfo.Column;
import androidx.room.util.TableInfo.ForeignKey;
import androidx.room.util.TableInfo.Index;
import androidx.sqlite.db.SupportSQLiteDatabase;
import androidx.sqlite.db.SupportSQLiteOpenHelper;
import androidx.sqlite.db.SupportSQLiteOpenHelper.Callback;
import androidx.sqlite.db.SupportSQLiteOpenHelper.Configuration;
import java.lang.Class;
import java.lang.Override;
import java.lang.String;
import java.lang.SuppressWarnings;
import java.util.Arrays;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;

@SuppressWarnings({"unchecked", "deprecation"})
public final class DB_Impl extends DB {
  private volatile AutoveloxDao _autoveloxDao;

  @Override
  protected SupportSQLiteOpenHelper createOpenHelper(DatabaseConfiguration configuration) {
    final SupportSQLiteOpenHelper.Callback _openCallback = new RoomOpenHelper(configuration, new RoomOpenHelper.Delegate(1) {
      @Override
      public void createAllTables(SupportSQLiteDatabase _db) {
        _db.execSQL("CREATE TABLE IF NOT EXISTS `Autovelox` (`id` TEXT NOT NULL, `comune` TEXT, `provincia` TEXT, `regione` TEXT, `nome` TEXT, `anno_inserimento` TEXT, `data_ora_inserimento` TEXT, `longitudine` REAL NOT NULL, `latitudine` REAL NOT NULL, PRIMARY KEY(`id`))");
        _db.execSQL("CREATE TABLE IF NOT EXISTS room_master_table (id INTEGER PRIMARY KEY,identity_hash TEXT)");
        _db.execSQL("INSERT OR REPLACE INTO room_master_table (id,identity_hash) VALUES(42, 'de5059824ca29fedf445d0ba6e3d82de')");
      }

      @Override
      public void dropAllTables(SupportSQLiteDatabase _db) {
        _db.execSQL("DROP TABLE IF EXISTS `Autovelox`");
        if (mCallbacks != null) {
          for (int _i = 0, _size = mCallbacks.size(); _i < _size; _i++) {
            mCallbacks.get(_i).onDestructiveMigration(_db);
          }
        }
      }

      @Override
      protected void onCreate(SupportSQLiteDatabase _db) {
        if (mCallbacks != null) {
          for (int _i = 0, _size = mCallbacks.size(); _i < _size; _i++) {
            mCallbacks.get(_i).onCreate(_db);
          }
        }
      }

      @Override
      public void onOpen(SupportSQLiteDatabase _db) {
        mDatabase = _db;
        internalInitInvalidationTracker(_db);
        if (mCallbacks != null) {
          for (int _i = 0, _size = mCallbacks.size(); _i < _size; _i++) {
            mCallbacks.get(_i).onOpen(_db);
          }
        }
      }

      @Override
      public void onPreMigrate(SupportSQLiteDatabase _db) {
        DBUtil.dropFtsSyncTriggers(_db);
      }

      @Override
      public void onPostMigrate(SupportSQLiteDatabase _db) {
      }

      @Override
      protected RoomOpenHelper.ValidationResult onValidateSchema(SupportSQLiteDatabase _db) {
        final HashMap<String, TableInfo.Column> _columnsAutovelox = new HashMap<String, TableInfo.Column>(9);
        _columnsAutovelox.put("id", new TableInfo.Column("id", "TEXT", true, 1, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("comune", new TableInfo.Column("comune", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("provincia", new TableInfo.Column("provincia", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("regione", new TableInfo.Column("regione", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("nome", new TableInfo.Column("nome", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("anno_inserimento", new TableInfo.Column("anno_inserimento", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("data_ora_inserimento", new TableInfo.Column("data_ora_inserimento", "TEXT", false, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("longitudine", new TableInfo.Column("longitudine", "REAL", true, 0, null, TableInfo.CREATED_FROM_ENTITY));
        _columnsAutovelox.put("latitudine", new TableInfo.Column("latitudine", "REAL", true, 0, null, TableInfo.CREATED_FROM_ENTITY));
        final HashSet<TableInfo.ForeignKey> _foreignKeysAutovelox = new HashSet<TableInfo.ForeignKey>(0);
        final HashSet<TableInfo.Index> _indicesAutovelox = new HashSet<TableInfo.Index>(0);
        final TableInfo _infoAutovelox = new TableInfo("Autovelox", _columnsAutovelox, _foreignKeysAutovelox, _indicesAutovelox);
        final TableInfo _existingAutovelox = TableInfo.read(_db, "Autovelox");
        if (! _infoAutovelox.equals(_existingAutovelox)) {
          return new RoomOpenHelper.ValidationResult(false, "Autovelox(it.univaq.autovelox.entity.Autovelox).\n"
                  + " Expected:\n" + _infoAutovelox + "\n"
                  + " Found:\n" + _existingAutovelox);
        }
        return new RoomOpenHelper.ValidationResult(true, null);
      }
    }, "de5059824ca29fedf445d0ba6e3d82de", "f7038c6749e5bdb6ca013a91e8549386");
    final SupportSQLiteOpenHelper.Configuration _sqliteConfig = SupportSQLiteOpenHelper.Configuration.builder(configuration.context)
        .name(configuration.name)
        .callback(_openCallback)
        .build();
    final SupportSQLiteOpenHelper _helper = configuration.sqliteOpenHelperFactory.create(_sqliteConfig);
    return _helper;
  }

  @Override
  protected InvalidationTracker createInvalidationTracker() {
    final HashMap<String, String> _shadowTablesMap = new HashMap<String, String>(0);
    HashMap<String, Set<String>> _viewTables = new HashMap<String, Set<String>>(0);
    return new InvalidationTracker(this, _shadowTablesMap, _viewTables, "Autovelox");
  }

  @Override
  public void clearAllTables() {
    super.assertNotMainThread();
    final SupportSQLiteDatabase _db = super.getOpenHelper().getWritableDatabase();
    try {
      super.beginTransaction();
      _db.execSQL("DELETE FROM `Autovelox`");
      super.setTransactionSuccessful();
    } finally {
      super.endTransaction();
      _db.query("PRAGMA wal_checkpoint(FULL)").close();
      if (!_db.inTransaction()) {
        _db.execSQL("VACUUM");
      }
    }
  }

  @Override
  protected Map<Class<?>, List<Class<?>>> getRequiredTypeConverters() {
    final HashMap<Class<?>, List<Class<?>>> _typeConvertersMap = new HashMap<Class<?>, List<Class<?>>>();
    _typeConvertersMap.put(AutoveloxDao.class, AutoveloxDao_Impl.getRequiredConverters());
    return _typeConvertersMap;
  }

  @Override
  public Set<Class<? extends AutoMigrationSpec>> getRequiredAutoMigrationSpecs() {
    final HashSet<Class<? extends AutoMigrationSpec>> _autoMigrationSpecsSet = new HashSet<Class<? extends AutoMigrationSpec>>();
    return _autoMigrationSpecsSet;
  }

  @Override
  public List<Migration> getAutoMigrations(
      @NonNull Map<Class<? extends AutoMigrationSpec>, AutoMigrationSpec> autoMigrationSpecsMap) {
    return Arrays.asList();
  }

  @Override
  public AutoveloxDao autoveloxDao() {
    if (_autoveloxDao != null) {
      return _autoveloxDao;
    } else {
      synchronized(this) {
        if(_autoveloxDao == null) {
          _autoveloxDao = new AutoveloxDao_Impl(this);
        }
        return _autoveloxDao;
      }
    }
  }
}
