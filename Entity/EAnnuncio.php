<?php

/**
 * La classe EAnnuncio contiene tutti gli attributi e i metodi relativi agli annunci
 * Gli attributi sono:
 * titolo: titolo Annuncio
 * descrizione: descrizione Annuncio
 * prezzo: prezzo Annuncio
 * idFoto: id foto Annuncio
 * data: data pubblicazione Annuncio
 * idAnnuncio: id univoco Annuncio
 * idVenditore: id di chi pubblica l'Annuncio
 * idCompratore: id di chi compra l'Annuncio
 * categoria: categoria Annuncio
 * ban: ban Annuncio
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class EAnnuncio implements JsonSerializable
{
    /**
     * titolo Annuncio
     * @var string
     */
    private string $titolo;
    /**
     * descrizione Annuncio
     * @var string
     */
    private string $descrizione;
    /**
     * prezzo Annuncio
     * @var float
     */
    private  $prezzo;
    /**
     * id foto Annuncio
     * @var int
     */
    private int $idFoto;
    /**
     * data pubblicazione Annuncio
     * @var DateTime
     */
    private DateTime $data;
    /**
     * id univoco Annuncio
     * @var int
     */
    private int $idAnnuncio;
    /**
     * id venditore Annuncio
     * @var int
     */
    private int $idVenditore;
    /**
     * id compratore Annuncio
     * @var int
     */
    private int $idCompratore;
    /**
     * categoria Annuncio
     * @var string
     */
    private string $categoria;
    /**
     * ban Annuncio
     * @var bool
     */
    private bool $ban;

    //---------------------------------------------------------------------------------COSTRUTTORE---------------------------------------------------------------------------------------------

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

    //-----------------------------------------------------------------------METODI GET E SET-------------------------------------------------------------------------------------------

    /**
     * @return int id foto Annuncio
     */
    public function getIdFoto(): int
    {
        return $this->idFoto;
    }

    /**
     * @param int $idFoto id foto Annuncio
     */
    public function setIdFoto(int $idFoto): void
    {
        $this->idFoto = $idFoto;
    }

    /**
     * @return int id venditore Annuncio
     */
    public function getIdVenditore(): int
    {
        return $this->idVenditore;
    }

    /**
     * @param int $idVenditore id venditore Annuncio
     */
    public function setIdVenditore(int $idVenditore): void
    {
        $this->idVenditore = $idVenditore;
    }

    /**
     * @return int id compratore Annuncio
     */
    public function getIdCompratore(): int
    {
        return $this->idCompratore;
    }

    /**
     * @param int $idCompratore id compratore Annuncio
     */
    public function setIdCompratore(int $idCompratore): void
    {
        $this->idCompratore = $idCompratore;
    }

    /**
     * @return string descrizione Annuncio
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param string $descrizione descrizione Annuncio
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return float prezzo Annuncio
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * @param float $prezzo prezzo Annuncio
     */
    public function setPrezzo($prezzo): void
    {
        $this->prezzo = $prezzo;
    }
    /**
     * @return DateTime data pubblicazione Annuncio
     */
    public function getData(): DateTime
    {
        return $this->data;
    }

    /**
     * @param DateTime $data data pubblicazione Annuncio
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string titolo Annuncio
     */
    public function getTitolo(): string
    {
        return $this->titolo;
    }

    /**
     * @param string $titolo titolo Annuncio
     */
    public function setTitolo(string $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @return int id Annuncio
     */
    public function getIdAnnuncio()
    {
        return $this->idAnnuncio;
    }

    /**
     * @param int $idAnnuncio id Annuncio
     */
    public function setIdAnnuncio($idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }

    /**
     * @return string categoria Annuncio
     */
    public function getCategoria(): string
    {
        return $this->categoria;
    }

    /**
     * @param string $categoria categoria Annuncio
     */
    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return bool ban Annuncio
     */
    public function isBan(): bool
    {
        return $this->ban;
    }

    /**
     * @param bool $ban ban Annuncio
     */
    public function setBan(bool $ban): void
    {
        $this->ban = $ban;
    }



    /**
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
                'categoria'   => $this->getCategoria()
            ];

    }
}

