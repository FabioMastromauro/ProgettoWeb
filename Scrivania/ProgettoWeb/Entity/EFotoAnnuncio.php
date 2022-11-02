<?php

/**
 * La classe EFotoAnnuncio estende la superclasse EFoto e ne
 * implementa l'attributo $idAnn, utilizzato per legare la foto
 * all'annuncio
 * @package Entity
 */
class EFotoAnnuncio extends EFoto implements JsonSerializable
{

    /**
     * @var int -> id dell'annuncio relativo alla foto
     */
    private $idAnn;

    /**
     * @param int $idFoto
     * @param string $nomeFoto
     * @param string $size
     * @param $tipo
     * @param $foto
     */
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
    }

    /**
     * @param mixed $idAnn
     */
    public function setIdAnn($idAnn): void
    {
        $this->idAnn = $idAnn;
    }

    /**
     * @return array
     */
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
}