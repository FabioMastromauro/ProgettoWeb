<?php

/**
 * La classe ERecensione contiene tutti gli attributi e i metodi relativi alle recensioni
 * Gli attributi sono:
 * commento: contenuto testuale Recensione
 * valutazione: valutazione annuncio
 * idRecensione: id univoco Recensione
 * idAnnuncio: id Annuncio recensito
 * dataPubblicazione: data pubblicazione Recensione
 * autore: autore Recensione
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class ERecensione implements JsonSerializable
{
    /**
     * commento Recensione
     * @var string|mixed|null
     */
    private string $commento;
    /**
     * valutazione annuncio
     * @var int|mixed|null
     */
    private int $valutazione;
    /**
     * id Recensione
     * @var int
     */
    private int  $idRecensione;
    /**
     * id annuncio recensito
     * @var int|mixed|null
     */
    private int $idAnnuncio;
    /**
     * data pubblicazione Recensione
     * @var DateTime|mixed|null
     */
    private DateTime  $dataPubblicazione;
    /**
     * autore Recensione
     * @var int|mixed|null
     */
    private int $autore;

    //---------------------------------------------------------------------------COSTRUTTORE----------------------------------------------------

    public function __construct($commento=null, $valutazione=null, $idAnnuncio=null,  $dataPubblicazione=null, $autore=null)
    {
        $this->commento = $commento;
        $this->valutazione = $valutazione;
        $this->idAnnuncio = $idAnnuncio;
        $this->dataPubblicazione = $dataPubblicazione;
        $this->autore = $autore;
    }

    //----------------------------------------------------------------METODI GET E SET-----------------------------------------------------

    /**
     * @return string commento Recensione
     */
    public function getCommento() :string
    {
        return $this->commento;
    }

    /**
     * @return string id Recensione
     */
    public function getIdRecensione()
    {
        return $this->idRecensione;
    }

    /**
     * @param string $idRecensione id Recensione
     */
    public function setIdRecensione($idRecensione): void
    {
        $this->idRecensione = $idRecensione;
    }

    /**
     * @param string $commento commento Recensione
     */
    public function setCommento(string $commento): void
    {
        $this->commento = $commento;
    }

    /**
     * @return DateTime|string data pubblicazione Recensione
     */
    public function getDataPubb()
    {
        return $this->dataPubblicazione;
    }

    /**
     * @param DateTime $data data pubblicazione Recensione
     */
    public function setDataPubb(DateTime $dataPubblicazione): void
    {
        $this->dataPubblicazione = $dataPubblicazione;
    }

    /**
     * @return int id annuncio recensito
     */
    public function getIdAnnuncio() : mixed
    {
        return $this->idAnnuncio;
    }

    /**
     * @param string $idAnnuncio id annuncio recensito
     */
    public function setIdAnnuncio(string $idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }

    /**
     * @return int valutazione annuncio
     */
    public function getValutazione(){
        return $this->valutazione;
    }

    /**
     * @param mixed $valutazione valutazione annuncio
     */
    public function setValutazione($valutazione): void
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @return int autore Recensione
     */
    public function getAutore()
    {
        return $this->autore;
    }

    /**
     * @param int $autore autore recensione
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