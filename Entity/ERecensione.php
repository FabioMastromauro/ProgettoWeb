<?php

class ERecensione implements JsonSerializable
{
    private string $commento; /* contenuto della recensione*/
    private $valutazione;
    private string $idRecensione; /* identificativo della recensione */
    private $idAnnuncio;
    private DateTime $dataPubblicazione; /* data di pubblicazione della recensione */
    private $autore;
    /**
     * @param $commento
     * @param $valutazione
     * @param $idRecensione
     * @param $idAnnuncio
     * @param $dataPubblicazione
     * @param $autore
     */
    public function __construct($commento=null, $valutazione=null, $idRecensione=null, $idAnnuncio=null, $dataPubblicazione=null, $autore=null)
    {
        $this->commento = $commento;
        $this->valutazione = $valutazione;
        $this->idRecensione = $idRecensione;
        $this->idAnnuncio = $idAnnuncio;
        $this->dataPubblicazione = $dataPubblicazione;
        $this->autore = $autore;
    }

    /**
     * @return string
     */
    public function getCommento() :string
    {
        return $this->commento;
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
     * @param string $commento
     */
    public function setCommento(string $commento): void
    {
        $this->commento = $commento;
    }

    /**
     * @return DateTime|string
     */
    public function getDataPubb()
    {
        return $this->dataPubblicazione->format('y-m-d');
    }

    /**
     * @param DateTime $data
     */
    public function setDataPubb(DateTime $dataPubblicazione): void
    {
        $this->dataPubblicazione = $dataPubblicazione;
    }

    /**
     * @return mixed
     */
    public function getIdAnnuncio() : mixed
    {
        return $this->idAnnuncio;
    }

    /**
     * @param string $idAnnuncio
     */
    public function setIdAnnuncio(string $idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }

    /**
     * @return mixed
     */
    public function getValutazione(){
        return $this->valutazione;
    }

    /**
     * @param mixed $valutazione
     */
    public function setValutazione($valutazione): void
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @return mixed
     */
    public function getAutore()
    {
        return $this->autore;
    }

    /**
     * @param mixed $autore
     */
    public function setAutore($autore): void
    {
        $this->autore = $autore;
    }

    public function jsonSerialize()
    {
        return
            [
                'commento'   => $this->getCommento(),
                'valutazione' => $this->getValutazione(),
                'idRecensione'   => $this->getIdRecensione(),
                'idAnnuncio'   => $this->getIdAnnuncio(),
                'dataPubblicazione' => $this->getDataPubb(),
                'autore'   => $this->getAutore()
            ];
    }
}