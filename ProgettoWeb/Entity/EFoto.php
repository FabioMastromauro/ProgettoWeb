<?php

class EFoto implements JsonSerializable
{
    protected int $idFoto;
    protected string $nomeFoto;
    protected $size;
    protected $tipo;
    protected $foto;

    /**
     * @param int $idFoto
     * @param string $nomeFoto
     * @param  $size
     * @param $tipo
     * @param $foto
     */
    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        $this->idFoto = $idFoto;
        $this->nomeFoto = $nomeFoto;
        $this->size = $size;
        $this->tipo = $tipo;
        $this->foto = $foto;
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
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto): void
    {
        $this->foto = $foto;
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
                'idFoto'   => $this->getIdFoto(),
                'nomeFoto' => $this->getNomeFoto(),
                'size' => $this->getSize(),
                'tipo'  =>  $this->getTipo(),
                'foto'  =>  $this->getFoto()
            ];
    }




}