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
    public function __construct(int $idFoto, string $nomeFoto, int $altezza, int $larghezza, $tipo, $data, $idUser)
    {
        parent::__construct($idFoto, $nomeFoto, $altezza, $larghezza, $tipo, $data);
        $this->idUser = $idUser;
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
                'altezza'   => $this->getAltezza(),
                'larghezza'   => $this->getLarghezza(),
                'tipo'  =>  $this->getTipo(),
                'data'  =>  $this->getData(),
                'idUser' => $this->getIdUser()
            ];
    }


}