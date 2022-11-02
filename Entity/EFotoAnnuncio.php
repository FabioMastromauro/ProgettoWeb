<?php

/**
 * La classe EFotoAnnuncio è un'estensione della classe EFoto, e associa le foto all'annuncio
 * Gli attributi sono:
 * idAnn: id annuncio Foto
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class EFotoAnnuncio extends EFoto implements JsonSerializable
{
    /**
     * @var int id Annuncio
     */
   private int $idAnn;

   //-----------------------------COSTRUTTORE------------------------------------------------

    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        parent::__construct($idFoto, $nomeFoto, $size, $tipo, $foto);
        // $this->idAnn = $idAnn;
    }

    //-------------------------METODI GET E SET-----------------------------------------------

    /**
     * @return int id annuncio
     */
    public function getIdAnn()
    {
        return $this->idAnn;
    }
    /**
     * @param int $idAnn id annuncio
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
}