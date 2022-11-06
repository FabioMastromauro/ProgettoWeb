<?php

/**
 * La classe EFoto contiene tutti gli attributi e i metodi relativi alle Immagini/Foto
 * Gli attributi sono:
 * idFoto: id univoco Foto
 * nomeFoto: nome Foto
 * size: dimensione Foto
 * tipo: MIME type Foto
 * foto: Foto
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class EFoto implements JsonSerializable
{
    /**
     * @var int id Foto
     */
    protected int $idFoto;
    /**
     * @var string nome Foto
     */
    protected string $nomeFoto;
    /**
     * @var mixed dimensione Foto
     */
    protected $size;
    /**
     * @var mixed MIME type Foto
     */
    protected $tipo;
    /**
     * @var mixed Foto
     */
    protected $foto;

    //----------------------------------------COSTRUTTORE-----------------------------------------

    public function __construct(int $idFoto, string $nomeFoto, string $size, $tipo, $foto)
    {
        $this->idFoto = $idFoto;
        $this->nomeFoto = $nomeFoto;
        $this->size = $size;
        $this->tipo = $tipo;
        $this->foto = $foto;
    }

    //-------------------------------------METODI GET E SET----------------------------------------

    /**
     * @return int id Foto
     */
    public function getIdFoto(): int
    {
        return $this->idFoto;
    }

    /**
     * @param int $idFoto id Foto
     */
    public function setIdFoto(int $idFoto): void
    {
        $this->idFoto = $idFoto;
    }

    /**
     * @return string nome Foto
     */
    public function getNomeFoto(): string
    {
        return $this->nomeFoto;
    }

    /**
     * @param string $nomeFoto nome Foto
     */
    public function setNomeFoto(string $nomeFoto): void
    {
        $this->nomeFoto = $nomeFoto;
    }

    /**
     * @return mixed dimensione Foto
     */
    public function getSize(): mixed
    {
        return $this->size;
    }

    /**
     * @param mixed $size dimensione Foto
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed MIME type Foto
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo MIME type Foto
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed Foto
     */
    public function getFoto()
    {
        return base64_encode($this->foto);
    }

    /**
     * @param mixed $foto Foto
     */
    public function setFoto($foto): void
    {
        $this->foto = $foto;
    }
    
    //----------------------------------------ALTRI METODI-----------------------------------

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