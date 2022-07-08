<?php

class ECategoria
{
    private $categoria;
    private $id;

    /**
     * @param $categoria
     * @param $id
     */
    public function __construct($categoria, $id)
    {
        $this->categoria = $categoria;
        $this->id = $id;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


}