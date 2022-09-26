package it.univaq.autovelox.database;

import android.database.Cursor;
import androidx.room.EntityInsertionAdapter;
import androidx.room.RoomDatabase;
import androidx.room.RoomSQLiteQuery;
import androidx.room.util.CursorUtil;
import androidx.room.util.DBUtil;
import androidx.sqlite.db.SupportSQLiteStatement;
import it.univaq.autovelox.entity.Autovelox;
import java.lang.Class;
import java.lang.Override;
import java.lang.String;
import java.lang.SuppressWarnings;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

@SuppressWarnings({"unchecked", "deprecation"})
public final class AutoveloxDao_Impl implements AutoveloxDao {
  private final RoomDatabase __db;

  private final EntityInsertionAdapter<Autovelox> __insertionAdapterOfAutovelox;

  public AutoveloxDao_Impl(RoomDatabase __db) {
    this.__db = __db;
    this.__insertionAdapterOfAutovelox = new EntityInsertionAdapter<Autovelox>(__db) {
      @Override
      public String createQuery() {
        return "INSERT OR REPLACE INTO `Autovelox` (`id`,`comune`,`provincia`,`regione`,`nome`,`anno_inserimento`,`data_ora_inserimento`,`longitudine`,`latitudine`) VALUES (?,?,?,?,?,?,?,?,?)";
      }

      @Override
      public void bind(SupportSQLiteStatement stmt, Autovelox value) {
        if (value.getId() == null) {
          stmt.bindNull(1);
        } else {
          stmt.bindString(1, value.getId());
        }
        if (value.getComune() == null) {
          stmt.bindNull(2);
        } else {
          stmt.bindString(2, value.getComune());
        }
        if (value.getProvincia() == null) {
          stmt.bindNull(3);
        } else {
          stmt.bindString(3, value.getProvincia());
        }
        if (value.getRegione() == null) {
          stmt.bindNull(4);
        } else {
          stmt.bindString(4, value.getRegione());
        }
        if (value.getNome() == null) {
          stmt.bindNull(5);
        } else {
          stmt.bindString(5, value.getNome());
        }
        if (value.getAnno_inserimento() == null) {
          stmt.bindNull(6);
        } else {
          stmt.bindString(6, value.getAnno_inserimento());
        }
        if (value.getData_ora_inserimento() == null) {
          stmt.bindNull(7);
        } else {
          stmt.bindString(7, value.getData_ora_inserimento());
        }
        stmt.bindDouble(8, value.getLongitudine());
        stmt.bindDouble(9, value.getLatitudine());
      }
    };
  }

  @Override
  public void save(final List<Autovelox> av) {
    __db.assertNotSuspendingTransaction();
    __db.beginTransaction();
    try {
      __insertionAdapterOfAutovelox.insert(av);
      __db.setTransactionSuccessful();
    } finally {
      __db.endTransaction();
    }
  }

  @Override
  public List<Autovelox> findAll() {
    final String _sql = "SELECT * FROM Autovelox ORDER BY id ASC";
    final RoomSQLiteQuery _statement = RoomSQLiteQuery.acquire(_sql, 0);
    __db.assertNotSuspendingTransaction();
    final Cursor _cursor = DBUtil.query(__db, _statement, false, null);
    try {
      final int _cursorIndexOfId = CursorUtil.getColumnIndexOrThrow(_cursor, "id");
      final int _cursorIndexOfComune = CursorUtil.getColumnIndexOrThrow(_cursor, "comune");
      final int _cursorIndexOfProvincia = CursorUtil.getColumnIndexOrThrow(_cursor, "provincia");
      final int _cursorIndexOfRegione = CursorUtil.getColumnIndexOrThrow(_cursor, "regione");
      final int _cursorIndexOfNome = CursorUtil.getColumnIndexOrThrow(_cursor, "nome");
      final int _cursorIndexOfAnnoInserimento = CursorUtil.getColumnIndexOrThrow(_cursor, "anno_inserimento");
      final int _cursorIndexOfDataOraInserimento = CursorUtil.getColumnIndexOrThrow(_cursor, "data_ora_inserimento");
      final int _cursorIndexOfLongitudine = CursorUtil.getColumnIndexOrThrow(_cursor, "longitudine");
      final int _cursorIndexOfLatitudine = CursorUtil.getColumnIndexOrThrow(_cursor, "latitudine");
      final List<Autovelox> _result = new ArrayList<Autovelox>(_cursor.getCount());
      while(_cursor.moveToNext()) {
        final Autovelox _item;
        _item = new Autovelox();
        final String _tmpId;
        if (_cursor.isNull(_cursorIndexOfId)) {
          _tmpId = null;
        } else {
          _tmpId = _cursor.getString(_cursorIndexOfId);
        }
        _item.setId(_tmpId);
        final String _tmpComune;
        if (_cursor.isNull(_cursorIndexOfComune)) {
          _tmpComune = null;
        } else {
          _tmpComune = _cursor.getString(_cursorIndexOfComune);
        }
        _item.setComune(_tmpComune);
        final String _tmpProvincia;
        if (_cursor.isNull(_cursorIndexOfProvincia)) {
          _tmpProvincia = null;
        } else {
          _tmpProvincia = _cursor.getString(_cursorIndexOfProvincia);
        }
        _item.setProvincia(_tmpProvincia);
        final String _tmpRegione;
        if (_cursor.isNull(_cursorIndexOfRegione)) {
          _tmpRegione = null;
        } else {
          _tmpRegione = _cursor.getString(_cursorIndexOfRegione);
        }
        _item.setRegione(_tmpRegione);
        final String _tmpNome;
        if (_cursor.isNull(_cursorIndexOfNome)) {
          _tmpNome = null;
        } else {
          _tmpNome = _cursor.getString(_cursorIndexOfNome);
        }
        _item.setNome(_tmpNome);
        final String _tmpAnno_inserimento;
        if (_cursor.isNull(_cursorIndexOfAnnoInserimento)) {
          _tmpAnno_inserimento = null;
        } else {
          _tmpAnno_inserimento = _cursor.getString(_cursorIndexOfAnnoInserimento);
        }
        _item.setAnno_inserimento(_tmpAnno_inserimento);
        final String _tmpData_ora_inserimento;
        if (_cursor.isNull(_cursorIndexOfDataOraInserimento)) {
          _tmpData_ora_inserimento = null;
        } else {
          _tmpData_ora_inserimento = _cursor.getString(_cursorIndexOfDataOraInserimento);
        }
        _item.setData_ora_inserimento(_tmpData_ora_inserimento);
        final double _tmpLongitudine;
        _tmpLongitudine = _cursor.getDouble(_cursorIndexOfLongitudine);
        _item.setLongitudine(_tmpLongitudine);
        final double _tmpLatitudine;
        _tmpLatitudine = _cursor.getDouble(_cursorIndexOfLatitudine);
        _item.setLatitudine(_tmpLatitudine);
        _result.add(_item);
      }
      return _result;
    } finally {
      _cursor.close();
      _statement.release();
    }
  }

  public static List<Class<?>> getRequiredConverters() {
    return Collections.emptyList();
  }
}
