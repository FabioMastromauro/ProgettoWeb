<?php

class EAnnuncio implements JsonSerializable
{
    private string $titolo;
    private string $descrizione;
    private  $prezzo;
    private int $idFoto;
    private  $data;
    private $idAnnuncio;
    private int $idVenditore;
    private int $idCompratore;
    private string $categoria;
    private bool $ban;

    /**
     * @param string $titolo
     * @param string $descrizione
     * @param float $prezzo
     * @param int $idFoto
     * @param  $data
     * @param int $idAnnuncio
     * @param int $idVenditore
     * @param int $idCompratore
     * @param string $categoria
     */
    public function __construct(string $titolo, string $descrizione,  $prezzo, int $idFoto,  $data,  int $idVenditore,/* int $idCompratore,*/ string $categoria, bool $ban)
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
     * @return 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param  $data
     */
    public function setData( $data): void
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

