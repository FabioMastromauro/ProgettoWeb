<?php

class EAnnuncio implements JsonSerializable
{
    private string $titolo;
    private string $descrizione;
    private float $prezzo;
    private int $idFoto;
    private Date $data;
    private int $idAnnuncio;
    private int $idVenditore;
    private int $idCompratore;
    private array $arrayFoto;

    /**
     * @param string $titolo
     * @param string $descrizione
     * @param float $prezzo
     * @param int $idFoto
     * @param Date $data
     * @param int $idAnnuncio
     * @param int $idVenditore
     * @param int $idCompratore
     * @param array $arrayFoto
     */
    public function __construct(string $titolo, string $descrizione, float $prezzo, int $idFoto, Date $data, int $idAnnuncio, int $idVenditore, int $idCompratore)
    {
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->idFoto = $idFoto;
        $this->data = $data;
        $this->idAnnuncio = $idAnnuncio;
        $this->idVenditore = $idVenditore;
        $this->idCompratore = $idCompratore;
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
     * @return array
     */
    public function getArrayFoto(): array
    {
        return $this->arrayFoto;
    }

    /**
     * @param array $arrayFoto
     */
    public function setArrayFoto(array $arrayFoto): void
    {
        $this->arrayFoto = $arrayFoto;
    }


    /**
     * @return int
     */
    public function getIdVenditore(): int
    {
        return $this->idVenditore;
    }

    /**
     * @param int $idVenditore
     */
    public function setIdVenditore(int $idVenditore): void
    {
        $this->idVenditore = $idVenditore;
    }

    /**
     * @return int
     */
    public function getIdCompratore(): int
    {
        return $this->idCompratore;
    }

    /**
     * @param int $idCompratore
     */
    public function setIdCompratore(int $idCompratore): void
    {
        $this->idCompratore = $idCompratore;
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

    public function addFoto($id): void{
        array_push($this->arrayFoto);
    }

    public function remFoto($id): void{
        foreach ($this->arrayFoto as $f => $foto){
            if ($foto == $id){
                unset($this->arrayFoto[$f]);
            }
        }
    }


    public function jsonSerialize()
    {
        return
            [
                'titolo'   => $this->getTitolo(),
                'descrizione' => $this->getDescrizione(),
                'prezzo'   => $this->getPrezzo(),
                'idFoto'   => $this->getIdFoto(),
                'data'   => $this->getData(),
                'idAnnuncio'   => $this->getIdAnnuncio(),
                'idVenditore'   => $this->getIdVenditore(),
                'idCompratore'   => $this->getIdCompratore(),
                'foto'   => $this->getArrayFoto()
            ];

    }
}

