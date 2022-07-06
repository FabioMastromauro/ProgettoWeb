<?php

class FFotoAnnuncio extends FDatabase{

    public function __construct()
    {
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "imgutente";
        $this->class = "FFotoAnnuncio";
        $this->values = "(:id, :nFoto,:altezza,:larghezza,:tipo,:data,:idAnn)";
    }
    public static function bind($stmt, EFotoAnnuncio $fotoAnnuncio){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nFoto', $fotoAnnuncio->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':altezza', $fotoAnnuncio->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $fotoAnnuncio->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $fotoAnnuncio->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $fotoAnnuncio->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':idAnn', $fotoAnnuncio->getIdAnn(), PDO::PARAM_INT);
    }

    public function getFromRow($row){

        $img = new EFotoAnnuncio($row['data'], $row['tipo'], $row['altezza'], $row['larghezza'], $row['nFoto']);
        $img->setIdAnn($row['idAnn']);
        $img->setIdFoto($row['id']);
        return $img;
    }

}