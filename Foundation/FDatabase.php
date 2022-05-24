<?php
if(file_exists('config.inc.php')) require_once 'config.inc.php';

class FDatabase
{
    private $connection;
    private $result;
    private $table;
    private $values;
    private $key;
    private $return;


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
            $this->className::bind($stmt, $obj); //Class::bind prende la funzione bind della classe che chiama la funzione
            $stmt->execute();//Salvataggio dati
            $Lid = $this->connection->lastInsertId();// valore numerico per idendificare l'ultimo elemnto aggiunto
            $this->connection->commit(); //fine transaction
            return $Lid;

        } catch (PDOException $e) {
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

        }


    }

    public function update($Lid, $attributo, $valore)
    {

        $q = "UPDATE" . $this->table . "SET" . $attributo . "=" . $valore . "WHERE id=" . $Lid; //update di un valore di una $table aggiorna un $attributo in un nuovo $valore


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

    public function delete($Lid)
    {
        $q = "DELETE FROM" . $this->table . "WHERE id=" . $Lid; // DELETE nella $table dell'$id

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

    public function search($attributo,$valore){
        $q ="SELECT * from ".$this->table." WHERE ".$attributo." = ".$valore;


        try{
            $this->connection->beginTransaction(); //inizio transazione per evitare errori
            $stmt =$this->connection->prepare($q); //elaborazione query
            $stmt->execute();//Salvataggio dati
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC mi da un output chiave-valore di tutta la $table con i valori $attributo uguali a $valore
            $this->connection->commit(); //fine transaction
            return $found;

        }
        catch(PDOException $e){
            $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
            echo 'errore' . $e->getMessage(); //printa il messaggio di errore

        }


    }


}
