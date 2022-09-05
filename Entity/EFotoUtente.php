<?php

class EFotoUtente extends EFoto implements JsonSerializable
{
    /**
     * id dell'utente
     * @AttributeType string
     */

    protected $idUser;

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

// forse il toString

}