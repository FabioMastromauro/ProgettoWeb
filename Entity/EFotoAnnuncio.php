<?php

class EFotoAnnuncio extends EFoto implements JsonSerializable
{

   private $idAnn;

    public function __construct(int $idFoto, string $nomeFoto, int $altezza, int $larghezza, $tipo, $data, $idAnn)
    {
        parent::__construct($idFoto, $nomeFoto, $altezza, $larghezza, $tipo, $data);
        $this->idAnn = $idAnn;
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
            'altezza'   => $this->getAltezza(),
            'larghezza'   => $this->getLarghezza(),
            'tipo'  =>  $this->getTipo(),
            'data'  =>  $this->getData(),
            'idAnn' => $this->getIdAnn()
        ];

}



}