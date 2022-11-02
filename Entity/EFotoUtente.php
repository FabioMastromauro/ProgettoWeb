<?php

/**
 * La classe EFotoUtente è un estensione della classe EFoto, e associa le foto agli utenti
 * Gli attributi sono:
 * idUser: id utente Foto
 */

class EFotoUtente extends EFoto implements JsonSerializable
{
    /**
     * @var int id utente
     */
    private int $idUser;

    //--------------------------------COSTRUTTORE----------------------------------------------

    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        parent::__construct($idFoto, $nomeFoto, $size, $tipo, $foto);
        // $this->idUser = $idUser;
    }

    //-------------------------------METODI GET E SET-------------------------------------------

    /**
     * @return int id utente
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser id utente
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    public function jsonSerialize ()
    {
        return
            [
                'id'   => $this->getIdFoto(),
                'Foto' => $this->getNomeFoto(),
                'size'   => $this->getSize(),
                'tipo'  =>  $this->getTipo(),
                'data'  =>  $this->getFoto(),
            ];
    }



}