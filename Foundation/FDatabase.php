<?php
if(file_exists('config.inc.php')) require_once 'config.inc.php';

class FDatabase
{
    protected $connection;
    protected $result;
    protected $table;
    protected $values;
    protected $key;
    protected $return;
    protected $class;



    public function __construct()
    {
        try {
            $this->connection = new PDO ("mysql:dbname=" . $GLOBALS['database'] . ";host=127.0.0.1", $GLOBALS['username'], $GLOBALS['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //per gestire errori ed eccezioni

        } catch (PDOException $e) {
            echo 'errore' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (USingleton::getInstance(self::$class) == null) {
            USingleton::getInstance(self::$class);
        }
        return USingleton::getInstance(self::$class);
    }

    public function store($obj)
    {
        $q = "INSERT INTO " . $this->table . " VALUES " . $this->values . ";";
        try {
            $this->connection->beginTransaction(); //inizio transazione per evitare errori
            $stmt = $this->connection->prepare($q); //elaborazione query
            $this->class::bind($stmt, $obj); //Class::bind prende la funzione bind della classe che chiama la funzione
            $stmt->execute();//Salvataggio dati
            $lid = $this->connection->lastInsertId();// valore numerico per idendificare l'ultimo elemnto aggiunto
            $this->connection->commit(); //fine transaction
            return $lid;

        } catch (PDOException $e) {
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

        }


    }

    public function loadDB($field, $id)
    {
        try {
            $this->connection->beginTransaction();
            $query = "SELECT * FROM " . $this->table . " WHERE " . $field . "='" . $id . "';";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num == 0) {
                $result = null;        //nessuna riga interessata. return null
            } elseif ($num == 1) {                          //nel caso in cui una sola riga fosse interessata
                $result = $stmt->fetch(PDO::FETCH_ASSOC);   //ritorna una sola riga
            } else {
                $result = array();                         //nel caso in cui piu' righe fossero interessate
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   //imposta la modalità di fetch come array associativo
                while ($row = $stmt->fetch())
                    $result[] = $row;                    //ritorna un array di righe.
            }

            return $result;
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            $this->connection->rollBack();
            return null;
        }
    }

    public function update($id, $attributo, $valore)
    {

        $q = "UPDATE" . $this->table . "SET" . $attributo . "=" . $valore . "WHERE id=" . $id; //update di un valore di una $table aggiorna un $attributo in un nuovo $valore


        try {
            $this->connection->beginTransaction(); //inizio transazione per evitare errori
            $stmt = $this->connection->prepare($q); //elaborazione query
            $stmt->execute();//Salvataggio dati
            $this->connection->commit(); //fine transaction
            return null;

        } catch (PDOException $e) {
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

        }

    }

    public function delete($id)
    {
        $q = "DELETE FROM" . $this->table . "WHERE id=" . $id; // DELETE nella $table dell'$id

        try {
            $this->connection->beginTransaction(); //inizio transazione per evitare errori
            $stmt = $this->connection->prepare($q); //elaborazione query
            $stmt->execute();//Salvataggio dati
            $this->connection->commit(); //fine transaction

        } catch (PDOException $e) {
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

        }

    }

/** Metodo che permette di eliminare un'istanza di una classe nel db
 *@param field campo usato per la cancellazione
 *@param id ,id usato per la cancellazione
 */
	public function deleteDB($field, $id)
    {
        try {
            $result = null;
            $this->connection->beginTransaction();
            $esiste = $this->existDB($field, $id);
            if ($esiste) {
                $query = "DELETE FROM " . $this->table . " WHERE " . $field . "='" . $id . "';";
                $stmt = $this->connection->prepare($query);
                $stmt->execute();
                $this->connection->commit();
                $this->closeDbConnection();
                $result = true;
            }
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            $this->connection->rollBack();
            return false;
        }
        return $result;
    }
    
    public function search ($input, $campo)
    {
        try {
            // $this->db->beginTransaction();
            $query = "SELECT * FROM " . $this->table . " WHERE " . $campo . " LIKE '%" . $input . "%';";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num == 0) {
                $result = null;        //nessuna riga interessata. return null
            } elseif ($num == 1) {                          //nel caso in cui una sola riga fosse interessata
                $result = $stmt->fetch(PDO::FETCH_ASSOC);   //ritorna una sola riga
            } else {
                $result = array();                         //nel caso in cui piu' righe fossero interessate
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   //imposta la modalità di fetch come array associativo
                while ($row = $stmt->fetch())
                    $result[] = $row;                    //ritorna un array di righe.
            }
            //  $this->closeDbConnection();
            return array($result, $num);
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            $this->connection->rollBack();
            return null;
        }
    }


    public function loadById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->connection->commit();
            return $row;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo "errore" . $e->getMessage();
            return null;
        }
    }


    public function loadAllByIds($ids)
    {

        $s = implode(", ", $ids);
        $s = "(" . $s . ")";
        $query = "SELECT * FROM " . $this->table . " WHERE id IN " . $s . ";";
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->connection->commit();
            return $rows;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo "errore" . $e->getMessage();
            return null;
        }
    }

    public function existDB ($field, $id)
    {
        try {
            $query = "SELECT * FROM " .$this->table . " WHERE " . $field . "='" . $id . "'";
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) == 1) return $result[0];  //rimane solo l'array interno
            else if (count($result) > 1) return $result;  //resituisce array di array
            $this->connection->commit();
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo "Errore: " . $e->getMessage();
            return null;
        }
    }

    public function accessoUtente($email, $pass){
        try {
            $query = 'SELECT * FROM ' . FUtente::getTable() . " WHERE email ='" . $email . "' AND password ='" . $pass . "';";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num == 0) {
                $result = null;
            } else {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $result;
        } catch (PDOException $e){
            echo "Attenzione errore: " . $e->getMessage();
            $this->connection->rollBack();
            return null;
        }
    }


    public function loadAll($attr)
    {
        $orderby = " ORDER BY " . $attr;
        $query = "SELECT * FROM " . $this->table . $orderby . ";";
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->connection->commit();
            return $rows;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }

    }

    /**  Metodo chr permette il salvataggio du un media di un oggetto passato come parametro alla funzione
     *@param $class, classe di cui si vuole salvare il media
     * @param obj oggetto interessato
     * @nome_file, nome del media da salvare
     */
    public function storeMedia ($obj,$nome_file) {
        try {
            $this->connection->beginTransaction();
            $query = "INSERT INTO ".$this->class." VALUES ".$this->values;
            $stmt = $this->connection->prepare($query);
            $this->class::bind($stmt,$obj,$nome_file);
            $stmt->execute();
            $id=$this->connection->lastInsertId();
            $this->connection->commit();
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e) {
            echo "Attenzione errore: ".$e->getMessage();
            $this->connection->rollBack();
            return null;
        }
    }

    /**
     * Funzione utilizzata per ritornare tutte le recensioni presenti sul database
     * Utilizzata nella pagina admin
     * @param $query query da eseguire
     */
    public function getAllRev ()
    {
        try {
            $query = "SELECT * FROM recensione;";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num == 0) {
                $result = null;
            } elseif ($num == 1) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch())
                    $result[] = $row;
            }
            return array($result, $num);
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            $this->connection->rollBack();
            return null;
        }
    }

    public function utentiByString ($array, $toSearch)
    {
        if ($toSearch == 'nome')
            $query = "SELECT * FROM utente where nome = '" . $array[0] . "' OR cognome = '" . $array[0] . "';";
        else
            $query = "SELECT * FROM utente where nome = '" . $array[0] . "' AND cognome = '" . $array[1] . "' OR nome = '" . $array[1] . "' AND cognome = '" . $array[0] . "';";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num == 0)
            $result = null;
        elseif ($num == 1)
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        else {
            $result = array();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch())
                $result[] = $row;
        }
        return array($result, $num);
    }


}