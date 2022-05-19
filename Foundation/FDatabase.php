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
     }

    catch (PDOException $e){
        echo 'errore' . $e->getMessage();
        }
    }

    public function store($obj){

       try{
           $stmt =$this->connection->prepare("INSERT INTO REGISTRY NEW VALUE");
           $stmt->bindParam($stmt,$obj);//Inserimento dati
           $stmt->execute();//Salvataggio dati
       }
       catch(PDOException $e){
           echo 'errore' . $e->getMessage(); //printa il messaggio di errore
           $this->connection->rollBack(); //ripristina i valori precendeti alla richiesta

       }


    }
}