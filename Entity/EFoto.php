<?php

class EFoto implements JsonSerializable
{
    protected int $idFoto;
    protected string $nomeFoto;
    protected int $altezza;
    protected int $larghezza;
    protected $tipo;
    protected $data;
    protected $idAnn;
    protected $idUser;

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
    public function __construct(int $idFoto, string $nomeFoto, int $altezza, int $larghezza, $tipo, $data)
    {
        $this->idFoto = $idFoto;
        $this->nomeFoto = $nomeFoto;
        $this->altezza = $altezza;
        $this->larghezza = $larghezza;
        $this->tipo = $tipo;
        $this->data = $data;
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
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }




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
     * @return int
     */
    public function getAltezza(): int
    {
        return $this->altezza;
    }

    /**
     * @param int $altezza
     */
    public function setAltezza(int $altezza): void
    {
        $this->altezza = $altezza;
    }

    /**
     * @return int
     */
    public function getLarghezza(): int
    {
        return $this->larghezza;
    }

    /**
     * @param int $larghezza
     */
    public function setLarghezza(int $larghezza): void
    {
        $this->larghezza = $larghezza;
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