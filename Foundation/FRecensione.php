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
        $stmt->bindValue(':idUser',$recensione->getIdUser());
}
// metodo che crea un oggetto da una riga della tabella recensione
public function getFromRow($row)
{
        $rece = new ERecensione($row['testo'],$row['data'],$row['idProdotto'],$row['idRecensione'],$row['idUser']);
        $rece->setIdRecensione($row['idRecensione']);
        return $rece; // ci vorrebbe anche un setBanato per le recensioni
}
public function loadById($id){
        $row = parent::loadbyId($id);//attraverso il metodo della classe padre restituisco la riga
        $arrece = $row[0];
        if(($row!=null) && (count($row)>0)){
            $rece = $this->getFromRow($arrece);
            return $rece;
    }
        else return null;{
    }
}
// metodo load di recensioni dal db dato un gruppo di id
public function loadByAllIds($ids){
        $array = parent:: loadbyallIds($ids);
        $arrayObj = array();
        if (($array=!null)&&(count($array)>0)){
            foreach ($array as $i){
                $rece = $this->getFromRow($i);
                array_push($arrayObj,$rece);
            }
            return $arrayObj;
        }
        else return null;
}
// metodo che trova le recensioni relative a un prodotto
public function loadByIdProdotto($idprodotto){
        $query = "SELECT * FROM ".$this->table." WHERE idProdotto =".$idprodotto.";";
        try{
            $this->localmp->beginTransaction();
            $stmt = $this->localmp->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->localmp->commit();
            $arrayrece=array();
            foreach ($rows as $row){
                $rece = $this->getFromRow($row);
                array_push($arrayrece,$rece);
            }
            return $arrayrece;
        }
        catch(PDOException $e){
            $this->localmp->rollback();
            echo "Attenzione, errore: ".$e->getMessage();
            return null;
        }
}
// metodo che trova le recensioni relativi a un utente
public function loadByIdUser($iduser){
        $query = "SELECT * FROM ".$this->table." WHERE idUser=".$iduser.";";
        try{
            $this->localmp->beginTransaction();
            $stmt = $this->localmp->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->local->commit();
            $arrayrece=array();
            foreach ($rows as $row){
                $rece = $this->getFromRow($row);
                array_push($arrayrece,$rece);
            }
            return $arrayrece;
        }
        catch (PDOException $e){
            $this->localmp->rollback();
            echo "Attenzione, errore: ".$e->getMessage();
            return null;
        }
}
public function search($attributo, $valore){
    $array = parent::search($attributo, $valore);
    $arrayobj = array();
    if(($array!=null)&&(count($array)>0)){
        foreach ($array as $i){
            $rece = $this->getFromRow($i);
            array_push($arrayobj,$rece);
        }
        return $arrayobj;
    }
    else return null;
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