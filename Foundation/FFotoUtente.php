<?php

class FFotoUtente extends FDatabase
{

    public function __construct(){
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "imgutente";
        $this->class = "FFotoUtente";
        $this->values = "(:id, :altezza, :larghezza, :tipo, :data, :idUser)";
    }

    public function storeMedia($media, $nome_file){
       parent::storeMedia($media, $nome_file);

    }

    /**
     * Metodo che permette la cancellazione del media di un utente in base all id(del media)
     * @param int $id del media (dell utente)
     * @return bool
     */
    public function delete($id){
      parent::delete($id);
    }

    /**
     * Metodo che effettua il bind degli attributi di
     * EFoto, con i valori contenuti nella tabella foto
     * @param $stmt
     * @param $immagine da salvare
     */
    public static function bind($stmt, EFotoUtente $fotoUtente){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nFoto', $fotoUtente->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':altezza', $fotoUtente->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $fotoUtente->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $fotoUtente->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $fotoUtente->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':idUser', $fotoUtente->getIdUser(), PDO::PARAM_INT);

    }

    public function getFromRow($row){

        $img = new EFotoUtente($row['data'], $row['tipo'], $row['altezza'], $row['larghezza'], $row['nFoto']);
        $img->setIdUser($row['idUser']);
        $img->setIdFoto($row['id']);
        return $img;
    }




}