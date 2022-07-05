<?php

class FFotoAnnuncio extends FDatabase{

    public function __construct()
    {
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "imgutente";
        $this->class = "FFotoUtente";
        $this->values = "(:id, :nFoto,:altezza,:larghezza,:tipo,:data,:idAnn)";
    }
    public static function bind($stmt, EFotoAnnuncio $foto){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nFoto', $foto->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':altezza', $foto->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $foto->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $foto->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $foto->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':idAnn', $foto->getIdAnn(), PDO::PARAM_INT);



    }

}