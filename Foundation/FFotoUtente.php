<?php

class FFotoUtente extends FDatabase
{

    public function __construct(){
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "imgutente";
        $this->class = "FFotoUtente";
        $this->values = "(:id, :altezza, :larghezza, :tipo, :data, :nomeU)";
    }

    public function storeMedia($media, $nome_file){
       parent::storeMedia($media, $nome_file);

    }

    /**
     * Metodo che permette la cancellazione del media di un utente in base all id(del media)
     * @param int $id del media (dell utente)
     * @return bool
     */
    public function delete($field, $id){
      parent::delete($field,$id);
    }

    public static function bind($stmt, EFotoUtente $fotoUtente){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':altezza', $fotoUtente->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $fotoUtente->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $fotoUtente->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $fotoUtente->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':nomeU', $fotoUtente->getNomeU(), PDO::PARAM_STR);

    }



}