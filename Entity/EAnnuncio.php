<?php

class EAnnuncio implements JsonSerializable
{
    private mixed $titolo;
    private mixed $descrizione;
    private  $prezzo;
    private mixed $idFoto;
    private  $data;
    private $idAnnuncio;
    private mixed $idVenditore;
    private mixed $idCompratore;
    private mixed $categoria;
    private mixed $ban;

    /**
     * @param mixed $titolo
     * @param mixed $descrizione
     * @param float $prezzo
     * @param mixed $idFoto
     * @param  $data
     * @param mixed $idAnnuncio
     * @param mixed $idVenditore
     * @param mixed $idCompratore
     * @param mixed $categoria
     */
    public function __construct(mixed $titolo, mixed $descrizione,  $prezzo, mixed $idFoto,  $data,  mixed $idVenditore, mixed $idCompratore, mixed $categoria, mixed $ban,$idAnnuncio=null)
    {
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->idFoto = $idFoto;
        $this->data = $data;
        $this->idVenditore = $idVenditore;
        $this->idCompratore = $idCompratore;
        $this->categoria = $categoria;
        $this->ban = $ban;
        $this->idAnnuncio=$idAnnuncio;
    }

    /**
     * @return mixed
     */
    public function getIdFoto(): mixed
    {
        return $this->idFoto;
    }

    /**
     * @param mixed $idFoto
     */
    public function setIdFoto(mixed $idFoto): void
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
     * @return mixed
     */
    public function getIdVenditore(): mixed
    {
        return $this->idVenditore;
    }

    /**
     * @param mixed $idVenditore
     */
    public function setIdVenditore(mixed $idVenditore): void
    {
        $this->idVenditore = $idVenditore;
    }

    /**
     * @return mixed
     */
    public function getIdCompratore(): mixed
    {
        return $this->idCompratore;
    }

    /**
     * @param mixed $idCompratore
     */
    public function setIdCompratore(mixed $idCompratore): void
    {
        $this->idCompratore = $idCompratore;
    }

    /**
     * @return mixed
     */
    public function getDescrizione(): mixed
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $descrizione
     */
    public function setDescrizione(mixed $descrizione): void
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
     * @return mixed
     */
    public function getTitolo(): mixed
    {
        return $this->titolo;
    }

    /**
     * @param mixed $titolo
     */
    public function setTitolo(mixed $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @return mixed
     */
    public function getIdAnnuncio()
    {
        return $this->idAnnuncio;
    }

    /**
     * @param mixed $idAnnuncio
     */
    public function setIdAnnuncio($idAnnuncio): void
    {
        $this->idAnnuncio = $idAnnuncio;
    }

    /**
     * @return mixed
     */
    public function getCategoria(): mixed
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria(mixed $categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function isBan(): mixed
    {
        return $this->ban;
    }

    /**
     * @param mixed $ban
     */
    public function setBan(mixed $ban): void
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

