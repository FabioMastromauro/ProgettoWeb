<?php

class FRecensione extends FDatabase{
    public function __construct()
    {
        parent::__construct(); //richiama il costruttore di FDatababse
        $this->table = 'recensione';
        $this->class = 'FRecensione';
        $this->valori = "(:testo, :data, :idProdotto, :idRecensione, :idUser )";
    }
public static function bind($stmt,ERecensione $recensione){
        $stmt->bindValue(':testo',$recensione->getTesto(),PDO::PARAM_STR);
        $stmt->bindValue(':data',$recensione->getData(),PDO::PARAM_STR);
        $stmt->bindValue(':idProdotto',$recensione->getIdProdotto(),PDO::PARAM_INT);
        $stmt->bindValue(':idRecensione',$recensione->getIdRecensione(),PDO::PARAM_INT);
        $stmt->bindValur(':idUser',$recensione->getIdUser());
}
public function load(){

}
public function contaRece(){
    $query ="SELECT COUNT(idRecensione) AS n FROM ".$this->table.";";
    try{
        $this->localmp->beginTransaction();
        $stmt = $this->localmp->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->localmp->commit();
        return $row[0]['n'];
    }
    catch (PDOException $e)
    {
        $this->localmp->rollBack();
        echo "Attenzione, errore: " . $e->getMessage();
        return null;
    }

}





}