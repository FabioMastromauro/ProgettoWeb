<?php

/**
 * La classe EFotoUtente estende la superclasse EFoto e ne
 * implementa l'attributo $idUser, utilizzato per legare la foto
 * all'utente
 * @package Entity
 */
class EFotoUtente extends EFoto implements JsonSerializable
{

    /**
     * @var int -> id dell'utente relativo alla foto
     */
    private $idUser;

    /**
     * @param $idUser
     */
    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        parent::__construct($idFoto, $nomeFoto, $size, $tipo, $foto);
        // $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return array
     */
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