<?php

/**
 * La classe ECategoria contiene tutti gli attributi e i metodi relativi alle categorie di annunci
 * Gli attributi sono:
 * categoria: nome Categoria
 * idCate: id Categoria
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class ECategoria implements JsonSerializable
{
    /**
     * @var string nome Categoria
     */
    private string $categoria;
    /**
     * @var int id Categoria
     */
    private int $idCate;

    //-----------------------------COSTRUTTORE--------------------------

    public function __construct($categoria)
    {
        $this->categoria = $categoria;
    }

    //--------------METODI GET E SET------------------------------------

    /**
     * @return string nome categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param string $categoria nome categoria
     */
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return int id Categoria
     */
    public function getIdCate()
    {
        return $this->idCate;
    }

    /**
     * @param int id Categoria
     */
    public function setIdCate($idCate): void
    {
        $this->idCate = $idCate;
    }

    public function jsonSerialize()
    {
        return
            [
                'categoria' => $this->getCategoria(),
                'idCate' => $this->getIdCate()
            ];
    }

}