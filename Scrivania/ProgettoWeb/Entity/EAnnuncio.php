<?php

/**
 * La classe EAnnuncio contiene attributi e metodi utilizzati per
 * ottenere informazioni riguardanti gli annunci
 * @package Entity
 */
class EAnnuncio implements JsonSerializable
{
    /**
     * @var string -> titolo dell'annuncio
     */
    private string $titolo;
    /**
     * @var string -> descrizione dell'annuncio
     */
    private string $descrizione;
    /**
     * @var float -> prezzo dell'annuncio
     */
    private  $prezzo;
    /**
     * @var int -> id della/e foto riguardante l'annuncio
     */
    private int $idFoto;
    /**
     * @var DateTime -> data di pubblicazione dell'annuncio
     */
    private DateTime $data;
    /**
     * @var int -> id dell'annuncio
     */
    private $idAnnuncio;
    /**
     * @var int -> id dell'utente venditore
     */
    private int $idVenditore;
    /**
     * @var int -> id dell'utente compratore
     */
    private int $idCompratore;
    /**
     * @var string -> categoria di appartenenza dell'annuncio
     */
    private string $categoria;
    /**
     * @var bool -> valore che sarà 0 se l'annuncio non è bannato e 1 se lo è
     */
    private bool $ban;

    /**
     * @param string $titolo
     * @param string $descrizione
     * @param float $prezzo
     * @param int $idFoto
     * @param DateTime $data
     * @param int $idAnnuncio
     * @param int $idVenditore
     * @param int $idCompratore
     * @param string $categoria
     */
    public function __construct(string $titolo, string $descrizione,  $prezzo, int $idFoto, DateTime $data,  int $idVenditore,/* int $idCompratore,*/ string $categoria, bool $ban)
    {
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->idFoto = $idFoto;
        $this->data = $data;
        $this->idVenditore = $idVenditore;
        // $this->idCompratore = $idCompratore;
        $this->categoria = $categoria;
        $this->ban = $ban;
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
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * @param float $prezzo
     */
    public function setPrezzo($prezzo): void
    {
        $this->prezzo = $prezzo;
    }
    /**
     * @return DateTime
     */
    public function getData(): DateTime
    {
        return $this->data;
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
    public function getIdAnnuncio()
    {
        return $this->idAnnuncio;
    }

    /**
     * @param int $idAnnuncio
     */
    public function setIdAnnuncio($idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }

    /**
     * @return int
     */
    public function getCategoria(): int
    {
        return $this->categoria;
    }

    /**
     * @param string $categoria
     */
    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return bool
     */
    public function isBan(): bool
    {
        return $this->ban;
    }

    /**
     * @param bool $ban
     */
    public function setBan(bool $ban): void
    {
        $this->ban = $ban;
    }

    /**
     * @return array
     */
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
                'categoria'   => $this->getCategoria(),
                'ban'   => $this->isBan()
            ];

    }
}

