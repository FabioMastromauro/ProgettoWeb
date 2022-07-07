<?php

class FRecensione extends FDatabase{
    public function __construct()
    {
        parent::__construct(); //richiama il costruttore di FDatababse
        $this->table = 'recensione';
        $this->class = 'FRecensione';
        $this->valori = "(:testo, :data, :idProdotto, :idRecensione, :idUser )";
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getValori(): string
    {
        return $this->valori;
    }

    /**
     * @param string $valori
     */
    public function setValori(string $valori): void
    {
        $this->valori = $valori;
    }


    public function store($rec) {
        $db = FDatabase::getInstance();
        $id = $db->store($rec);
        if($id)
            return $id;
        else
            return null;
    }

    public static function exist($field, $id) {
        $ris = false;
        $db = FDatabase::getInstance();
        $result = $db->existDB($field, $id);
        if($result!=null)
            $ris = true;
        else
            $ris=false;

        return $ris;
    }

    public  function deleteDB($field, $id) {
        $db = FDatabase::getInstance();
        $result = $db->deleteDB($field, $id);
        if($result)
            return true;
        else
            return false;
    }

    public static function loadByParola($parola) {
        $rec = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->search($parola, "testo");
        if(($result != null) && ($rows_number == 1)) {
            $rec = new ERecensione($result['testo'],$result['data'],$result['idProdotto'],$result['idRecensione'], $result['idUser']);
            $rec->setId($result['id']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $rec = array();
                for($i = 0; $i < count($result); $i++){
                    $rec[] = new ERecensione($result['testo'],$result['data'],$result['idProdotto'],$result['idRecensione'], $result['idUser']);
                    $rec[$i]->setId($result[$i]['id']);
                }
            }
        }
        return $rec;
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


    // metodo che trova le recensioni relativi a un utente
    public function loadByIdUser($iduser){
            $query = "SELECT * FROM ".$this->table." WHERE idUser=".$iduser.";";
            try{
                $connection = parent::getInstance();
                $connection->beginTransaction();
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $connection->commit();
                $arrayrece=array();
                foreach ($rows as $row){
                    $rece = $this->getFromRow($row);
                    array_push($arrayrece,$rece);
                }
                return $arrayrece;
            }
            catch (PDOException $e){
                $connection->rollback();
                echo "Attenzione, errore: ".$e->getMessage();
                return null;
            }
    }


    public function search($attributo, $valore){
        $array = parent::search($attributo, $valore);
        $arrayRece = array();
        if(($array!=null)&&(count($array)>0)){
            foreach ($array as $i){
                $rece = $this->getFromRow($i);
                array_push($arrayRece,$rece);
            }
            return $arrayRece;
        }
        else return null;
    }

    //conte il numero delle recensioni totali
    public function numeroRece(){
        $query ="SELECT COUNT(idRecensione) AS n FROM ".$this->table.";";
        try{
            $connection= parent::getInstance();
            $connection->beginTransaction();
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $connection->commit();
            return $row[0]['n'];
        }
        catch (PDOException $e)
        {
            $connection->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }

    }

    //carica tutte le recensioni
    public function loadAllRec() {
        $rec = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->getAllRev();
        if(($result != null) && ($rows_number == 1)) {
            $rec = new ERecensione($result['testo'],$result['data'],$result['idProdotto'],$result['idRecensione'],$result['idUser']);
            $rec->setId($result['id']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $rec = array();
                for($i = 0; $i < count($result); $i++){
                    $rec[] = new ERecensione($result[$i]['testo'],$result[$i]['data'],$result[$i]['idProdotto'],$result[$i]['idRecensione'],$result[$i]['idUser']);
                    $rec[$i]->setId($result[$i]['id']);
                }
            }
        }
        return $rec;
    }




}