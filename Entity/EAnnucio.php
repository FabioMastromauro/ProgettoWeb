<?php

class EAnnucio
{
    private string $titolo;
    private string $descrizione;
    private float $prezzo;
    private Foto $foto;
    private Date $data;
    private int $idAnnuncio;

    /**
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
     * @return string
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param string $descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return float
     */
    public function getPrezzo(): float
    {
        return $this->prezzo;
    }

    /**
     * @param float $prezzo
     */
    public function setPrezzo(float $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @return Foto
     */
    public function getFoto(): Foto
    {
        return $this->foto;
    }

    /**
     * @param Foto $foto
     */
    public function setFoto(Foto $foto): void
    {
        $this->foto = $foto;
    }

    /**
     * @return Date
     */
    public function getData(): Date
    {
        return $this->data;
    }

    /**
     * @param Date $data
     */
    public function setData(Date $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * @param string $titolo
     */
    public function setTitolo(string $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @return int
     */
    public function getIdAnnuncio(): int
    {
        return $this->idAnnuncio;
    }

    /**
     * @param int $idAnnuncio
     */
    public function setIdAnnuncio(int $idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }






}