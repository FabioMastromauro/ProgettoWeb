<?php
if(file_exists('config.inc.php')) require_once 'config.inc.php';

class FDatabase
{
    private $connection;
    private $result;
    private $table;
    private $key;
    private $return;


   public function __construct(){
    try{
        $this->connection = new PDO ("mysql:dbname=".$GLOBALS['database'].";host=127.0.0.1", $GLOBALS['username'], $GLOBALS['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //per gestire errori ed eccezioni

    }

    catch (PDOException $e){
        echo 'errore' . $e->getMessage();
        }
    }

    public function store($obj){
    $q = "INSERT INTO ".$this->table." VALUES ".$this->values.";";
       try{
           $this->connection->beginTransaction(); //inizio transazione per evitare errori
           $stmt =$this->connection->prepare($q); //elaborazione query
           $this->connection->commit(); //fine transaction


           $stmt->execute();//Salvataggio dati
       }
       catch(PDOException $e){
           $this->connection->rollBack();//in caso di errore ripristina lo stato precedente del db
           echo 'errore' . $e->getMessage(); //printa il messaggio di errore
           $this->connection->rollBack(); //ripristina i valori precendeti alla richiesta

       }


    }
}