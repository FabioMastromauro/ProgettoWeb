<?php

class ERecensione implements JsonSerializable
{
    private string $testo; /* contenuto della recensione*/
    private DateTime $data; /* data di pubblicazione della recensione */
    private string $idProdotto; /* il prodotto della recensione */
    private string $idRecensione; /* identificativo della recensione */
    private string $idUser; /* idetificativo dell'utente che ha commentato*/
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
     * @return string
     */
    public function getTesto() :string
    {
        return $this->testo;
    }

    /**
     * @return string
     */
    public function getIdRecensione() :string
    {
        return $this->idRecensione;
    }

    /**
     * @param string $idRecensione
     */
    public function setIdRecensione($idRecensione): void
    {
        $this->idRecensione = $idRecensione;
    }

    /**
     * @param string $testo
     */
    public function setTesto($testo): void
    {
        $this->testo = $testo;
    }

    /**
     * @return string
     */
    public function getData() : string
    {
        return $this->data->format('d/m/y');
    }

    /**
     * @param DateTime $data
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getIdProdotto() :string
    {
        return $this->idProdotto;
    }

    /**
     * @param string $idProdotto
     */
    public function setIdProdotto(string $idProdotto): void
    {
        $this->idProdotto = $idProdotto;
    }

    /**
     * @return string
     */
    public function getIdUser() :string
    {
            return $this->idUser;
    }

    /**
     * @param string $idUser
     */
    public function setIdUser(string $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function __toString(): string
    {
     $print= "IDUtente: ".$this->idUser."Prodotto: ".$this->idRecensione."idProdotto: ".$this->data->format('d/m/y')."IDProdotto: ".$this->idRecensione."Testo: ".$this->testo ;
       return $print;
    }

    public function jsonSerialize()
    {
        return
            [
                'testo'   => $this->getTesto(),
                'data' => $this->getData(),
                'idProdotto'   => $this->getIdProdotto(),
                'idRecensione'   => $this->getIdRecensione(),
                'idUser'   => $this->getIdUser()
            ];
    }
}