<?php

class EFotoAnnuncio extends EFoto implements JsonSerializable
{

   private $idAnn;

    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        parent::__construct($idFoto, $nomeFoto, $size, $tipo, $foto);
        // $this->idAnn = $idAnn;
    }

    /**
 * @return mixed
 */
public function getIdAnn()
{
    return $this->idAnn;
}/**
 * @param mixed $idAnn
 */
public function setIdAnn($idAnn): void
{
    $this->idAnn = $idAnn;
}

public function jsonSerialize()
{
    return
        [
            'id'   => $this->getIdFoto(),
            'nFoto' => $this->getNomeFoto(),
            'size'   => $this->getSize(),
            'tipo'  =>  $this->getTipo(),
            'foto'  =>  $this->getFoto(),
        ];

}

// forse il toString



}