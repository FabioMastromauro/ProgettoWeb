<?php

/**
 * La classe ERecensione contiene attributi e metodi utilizzati per
 * ottenere informazioni sulle recensioni degli annunci
 * @package Entity
 */
class ERecensione implements JsonSerializable
{
    /**
     * @var string|mixed|null -> contenuto della recensione
     */
    private string $commento;
    /**
     * @var mixed|null -> voto che va da 0 a 5
     */
    private $valutazione;
    /**
     * @var -> id della recensione
     */
    private  $idRecensione;
    /**
     * @var mixed|null -> id dell'annuncio relativo alla recensione
     */
    private $idAnnuncio;
    /**
     * @var mixed|null -> data di pubblicazione della recensione
     */
    private  $dataPubblicazione;
    /**
     * @var mixed|null -> utente che ha scritto la recensione
     */
    private $autore;
    /**
     * @param $commento
     * @param $valutazione
     * @param $idRecensione
     * @param $idAnnuncio
     * @param $dataPubblicazione
     * @param $autore
     */
    public function __construct($commento=null, $valutazione=null, $idAnnuncio=null,  $dataPubblicazione=null, $autore=null)
    {
        $this->commento = $commento;
        $this->valutazione = $valutazione;
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
    public function getIdRecensione()
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
        return $this->dataPubblicazione;
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

    /**
     * @return array
     */
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