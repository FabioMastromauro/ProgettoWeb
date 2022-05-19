<?php

class EFoto
{
    private int $idFoto;
    private string $nomeFoto;
    private int $altezza;
    private int $larghezza;
    private $tipo;
    private $data;
    private $idAnnuncio;
    private $idUser;

    /**
     * @return mixed
     */
    public function getIdAnnuncio()
    {
        return $this->idAnnuncio;
    }

    /**
     * @param mixed $idAnnuncio
     */
    public function setIdAnnuncio($idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
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
}