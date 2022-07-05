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

    public function update($lid, $attributo, $valore)
    {

        $q = "UPDATE" . $this->table . "SET" . $attributo . "=" . $valore . "WHERE id=" . $lid; //update di un valore di una $table aggiorna un $attributo in un nuovo $valore


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

    public function delete($lid)
    {
        $q = "DELETE FROM" . $this->table . "WHERE id=" . $lid; // DELETE nella $table dell'$id

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

    public function search($attributo, $valore)
    {
        $q = "SELECT * from " . $this->table . " WHERE " . $attributo . " = " . $valore;


        try {
            $this->connection->beginTransaction(); //inizio transazione per evitare errori
            $stmt = $this->connection->prepare($q); //elaborazione query
            $stmt->execute();//Salvataggio dati
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC mi da un output chiave-valore di tutta la $table con i valori $attributo uguali a $valore
            $this->connection->commit(); //fine transaction
            return $found;

        } catch (PDOException $e) {
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

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
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) == 1) return $result[0];  //rimane solo l'array interno
            else if (count($result) > 1) return $result;  //resituisce array di array
            $this->closeDbConnection();
        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
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

}