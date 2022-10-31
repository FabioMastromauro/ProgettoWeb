<?php

class ECategoria implements JsonSerializable
{
    private $categoria;
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

    public function jsonSerialize()
    {
        return
            [
                'categoria' => $this->getCategoria(),
                'idCate' => $this->getIdCate()
            ];
    }

}