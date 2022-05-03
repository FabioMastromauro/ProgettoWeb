<?php

class Recensione
{
    private $testo; /* contenuto della recensione*/
    private $data; /* data di pubblicazione della recensione */
    private $idProdotto; /* il prodotto della recensione */
    private $idRecensione; /* identificativo della recensione */
    private $idUser; /* idetificativo dell'utente che ha commentato*/
    /**
     * @param $testo
     * @param $data
     * @param $idProdotto
     * @param $idRecensione
     * @param $idUser
     */
    public function __construct($testo, $data, $idProdotto, $idRecensione, $idUser)
    {
        $this->testo = $testo;
        $this->data = $data;
        $this->idProdotto = $idProdotto;
        $this->idRecensione = $idRecensione;
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getTesto()
    {
        return $this->testo;
    }

    /**
     * @return mixed
     */
    public function getIdRecensione()
    {
        return $this->idRecensione;
    }

    /**
     * @param mixed $idRecensione
     */
    public function setIdRecensione($idRecensione): void
    {
        $this->idRecensione = $idRecensione;
    }

    /**
     * @param mixed $testo
     */
    public function setTesto($testo): void
    {
        $this->testo = $testo;
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

    /**
     * @return mixed
     */
    public function getIdProdotto()
    {
        return $this->idProdotto;
    }

    /**
     * @param mixed $idProdotto
     */
    public function setIdProdotto($idProdotto): void
    {
        $this->idProdotto = $idProdotto;
    }

    /**
     * @return mixed
     */
    public function getIdCommento()
    {
        return $this->idCommento;
    }

    /**
     * @param mixed $idCommento
     */
    public function setIdCommento($idCommento): void
    {
        $this->idCommento = $idCommento;
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

    public function __toString(): string
    {
     $print= "IDUtente: ".$this->idUser."Prodotto: ".$this->idRecensione."idProdotto: ".$this->data."IDProdotto: ".$this->idRecensione."Testo: ".$this->testo ;
       return $print;
    }


}