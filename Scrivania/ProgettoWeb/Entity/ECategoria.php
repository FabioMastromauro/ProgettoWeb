<?php

/**
 * La classe ECategoria contiene attributi e metodi utilizzati per
 * ottenere informazioni sulle categorie cui appartengono gli annunci
 * @package Entity
 */
class ECategoria implements JsonSerializable
{
    /**
     * @var -> nome della categoria
     */
    private $categoria;
    /**
     * @var -> id della categoria
     */
    private $idCate;

    /**
     * @param $categoria
     * @param $id
     */
    public function __construct($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getIdCate()
    {
        return $this->idCate;
    }

    /**
     * @param mixed $idCate
     */
    public function setIdCate($idCate): void
    {
        $this->idCate = $idCate;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return
            [
                'categoria' => $this->getCategoria(),
                'idCate' => $this->getIdCate()
            ];
    }

}