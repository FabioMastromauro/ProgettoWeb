<?php

class EFoto implements JsonSerializable
{
    protected int $idFoto;
    protected string $nomeFoto;
    protected string $size;
    protected $tipo;
    protected $data;

    /**
     * @param int $idFoto
     * @param string $nomeFoto
     * @param int $altezza
     * @param int $larghezza
     * @param $tipo
     * @param $data
     * @param $idAnn
     * @param $idUser
     */
    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $data)
    {
        $this->idFoto = $idFoto;
        $this->nomeFoto = $nomeFoto;
        $this->size = $size;
        $this->tipo = $tipo;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
//get e set
    /**
     * @return int
     */
    public function getIdFoto(): int
    {
        return $this->idFoto;
    }

    /**
     * @param int $idFoto
     */
    public function setIdFoto(int $idFoto): void
    {
        $this->idFoto = $idFoto;
    }

    /**
     * @return string
     */
    public function getNomeFoto(): string
    {
        return $this->nomeFoto;
    }

    /**
     * @param string $nomeFoto
     */
    public function setNomeFoto(string $nomeFoto): void
    {
        $this->nomeFoto = $nomeFoto;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
    
    //funzioni 
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $tipo valore inserito
     * @return bool
     */
    public function valPic($tipo) {
        if($tipo=="image/jpeg" || $tipo=="image/png")
            return true;
        else
            return false;
    }

    public function jsonSerialize ()
    {
        return
            [
                'id'   => $this->getIdFoto(),
                'nFoto' => $this->getNomeFoto(),
                'altezza'   => $this->getAltezza(),
                'larghezza'   => $this->getLarghezza(),
                'tipo'  =>  $this->getTipo(),
                'data'  =>  $this->getData()
            ];
    }




}