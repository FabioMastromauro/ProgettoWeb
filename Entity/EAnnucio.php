<?php

/**
 * La classe EAnnuncio contiene gli attributi e i metodi relativi agli annunci
 * sono presenti i senguenti attributi e i relativi metodi:
 * - titolo: titolo dell'annuncio
 * - descrizione: breve descrizione dell'oggetto relativo all'annuncio
 * - prezzo: prezzo dell'oggetto relativo all'annuncio
 * - idFoto: id relativo alla foto dell'annunucio
 * - data: data di pubblicazione dell'annuncio
 * - idAnnuncio: id relativo all'annuncio
 * - idCompratore: id relativo all'eventuale compratore
 * - arrayFoto: array di id delle foto relative all'annuncio
 * @author Gruppo 7
 * @package Entity
 * **/
class EAnnucio
{
    /**titolo relativo all'annuncio */
    private string $titolo;
    /**descrizione dell'annuncio */
    private string $descrizione;
    /**prezzo relativo all'annuncio */
    private float $prezzo;
    /**id relativo alla foto dell'annuncio */
    private int $idFoto;
    /**data di pubblicazione dell'annuncio */
    private Date $data;
    /**id relativo all'annuncio */
    private int $idAnnuncio;
    /**id relativo al venditore */
    private int $idVenditore;
    /**id relativo all'eventuale compratore */
    private int $idCompratore;
    /** array di id delle foto relative all'annuncio */
    private array $arrayFoto;

    /**
     * COSTRUTTORE
     * @param string $titolo
     * @param string $descrizione
     * @param float $prezzo
     * @param Foto $foto
     * @param Date $data
     */

    public function __construct(string $titolo, string $descrizione, float $prezzo, Foto $foto, Date $data)
    {
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->foto = $foto;
        $this->data = $data;
    }


    /**
     * @return int id foto
     */
    public function getIdFoto(): int
    {
        return $this->idFoto;
    }

    /**
     * @param int $idFoto annuncio
     */
    public function setIdFoto(int $idFoto): void
    {
        $this->idFoto = $idFoto;
    }

    /**
     * @return array id foto
     */
    public function getArrayFoto(): array
    {
        return $this->arrayFoto;
    }

    /**
     * @param array $arrayFoto array degli id delle foto
     */
    public function setArrayFoto(array $arrayFoto): void
    {
        $this->arrayFoto = $arrayFoto;
    }


    /**
     * @return int id venditore
     */
    public function getIdVenditore(): int
    {
        return $this->idVenditore;
    }

    /**
     * @param int $idVenditore id venditore
     */
    public function setIdVenditore(int $idVenditore): void
    {
        $this->idVenditore = $idVenditore;
    }

    /**
     * @return int id compratore
     */
    public function getIdCompratore(): int
    {
        return $this->idCompratore;
    }

    /**
     * @param int $idCompratore id compratore
     */
    public function setIdCompratore(int $idCompratore): void
    {
        $this->idCompratore = $idCompratore;
    }

    /**
     * @return string Descrizione
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param string $descrizione descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return float prezzo annuncio
     */
    public function getPrezzo(): float
    {
        return $this->prezzo;
    }

    /**
     * @param float $prezzo prezzo annuncio
     */
    public function setPrezzo(float $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @return Foto foto annuncio
     */
    public function getFoto(): Foto
    {
        return $this->foto;
    }

    /**
     * @param Foto $foto foto annuncio
     */
    public function setFoto(Foto $foto): void
    {
        $this->foto = $foto;
    }

    /**
     * @return Date data
     */
    public function getData(): Date
    {
        return $this->data;
    }

    /**
     * @param Date $data data
     */
    public function setData(Date $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string titolo annuncio
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * @param string $titolo titolo annuncio
     */
    public function setTitolo(string $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @return int id annuncio
     */
    public function getIdAnnuncio(): int
    {
        return $this->idAnnuncio;
    }

    /**
     * @param int $idAnnuncio id annuncio
     */
    public function setIdAnnuncio(int $idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }
    /** aggiunge una foto all'array delle foto */
    public function addFoto($f): void{
        array_push($this->arrayFoto, $f);
    }
    /** rimuove una foto dall'array delle foto */

    public function remFoto($id): void{
        foreach ($this->arrayFoto as $f => $foto){
            if ($foto->getIdFoto()==$id){
                unset($this->arrayFoto[$f]);
            }
        }
    }






}