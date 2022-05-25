<?php

class FAnnuncio extends FDatabase{

public function __construct(){

    parent::__construct();
    $this->table = 'annuncio';
    $this->values = '(:titolo,:descrizione,:prezzo,:idfoto,:data,:idAnnuncio,:idVenditore,:idCompratore,:arrayfoto)';
    $this->class = 'FAnnuncio';

    }

    public function bind($stmt,EAnnucio $annuncio){
    $stmt->bindParam(':titolo',$annuncio->getTitolo(), PDO::PARAM_STR);
    $stmt->bindParam(':descrizone',$annuncio->getDescrizione(), PDO::PARAM_STR);
    $stmt->bindParam(':prezzo',$annuncio->getPrezzo(), PDO::PARAM_STR);
    $stmt->bindParam(':idfoto',$annuncio->getIdFoto(), PDO::PARAM_INT);
    $stmt->bindParam(':data',$annuncio->getData(), PDO::PARAM_STR);
    $stmt->bindParam(':idAnnuncio',$annuncio->getIdAnnuncio(), PDO::PARAM_INT);
    $stmt->bindParam(':idVenditore',$annuncio->getIdVenditore(), PDO::PARAM_INT);
    $stmt->bindParam(':idCompratore',$annuncio->getIdCompratore(), PDO::PARAM_INT);
    //arrayfoto???









} //per caricare tutti i dati nel database

    public  function getObjectFromRow($row){
        $tab = new EAnnuncio ($row['titolo'], $row['descrizione'], $row['prezzo'], $row['idfoto'],$row['idAnnuncio'],$row['idVenditore'], $row['idCompratore'], $row['arrayfoto']);

        return $tab;
    } //Crea un array con tutti gli elemnti dell'Annuncio


    public function search($attributo, $valore){
        $array = parent::search($attributo,$valore);
        $arrayAnnunci = array();
        if(($array!=null) && (count($array)>0)){
            foreach($array as $i){
                $tab = $this->getObjectFromRow($i);
                array_push($arrayAnnunci, $tab);
            }
            return $arrayAnnunci;
        }
        else return null;

    } //Cerco un annuncio attraverso un paramentro chiave-valore



}