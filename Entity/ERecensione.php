<?php
/**La classe ERecensione contiene gli attributi e i metodi relativi alle recensioni degli utenti.
 *Sono presenti i seguenti attributi e i relativi metodi get e set:
 * - idUser: id dell'utente
 * - idRecensione: id della recensione
 * - idProdotto: id prodotto della recensito
 * - data: data della recensione
 * - testo: testo della recensione
 * @author Gruppo 7
 * @package Entity
 */
class ERecensione
{
    /**testo della recensione */
    private $testo;
    /**data della recensione */
    private $data;
    /**id del prodotto recensito */
    private $idProdotto;
    /**id della recensione */
    private $idRecensione;
    /**id dell'utente */
    private $idUser;
    /**
     * COSTRUTTORE
     * @param $testo
     * @param $data
     * @param $idProdotto
     * @param $idRecensione
     * @param $idUser
     */
    public function __construct($testo, $data, $idProdotto, $idRecensione, $idUser)
    {
        $this->testo = $testo;
        $this->data = $data;
        $this->idProdotto = $idProdotto;
        $this->idRecensione = $idRecensione;
        $this->idUser = $idUser;
    }

    /**
     * @return mixed testo della recensione
     */
    public function getTesto()
    {
        return $this->testo;
    }

    /**
     * @return mixed id recensione
     */
    public function getIdRecensione()
    {
        return $this->idRecensione;
    }

    /**
     * @param mixed $idRecensione id recensione
     */
    public function setIdRecensione($idRecensione): void
    {
        $this->idRecensione = $idRecensione;
    }

    /**
     * @param mixed $testo testo della recensione
     */
    public function setTesto($testo): void
    {
        $this->testo = $testo;
    }

    /**
     * @return mixed data recensione
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data data recensione
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed id prodotto
     */
    public function getIdProdotto()
    {
        return $this->idProdotto;
    }

    /**
     * @param mixed $idProdotto id prodotto
     */
    public function setIdProdotto($idProdotto): void
    {
        $this->idProdotto = $idProdotto;
    }

    /**
     * @return mixed id utente
     */
    public function getIdUser()
    {
            return $this->idUser;
    }

    /**
     * @param mixed $idUser id utente
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     metodo to string per convertire tutto in stringa
     */
    public function __toString(): string
    {
     $print= "IDUtente: ".$this->idUser."Prodotto: ".$this->idRecensione."idProdotto: ".$this->data."IDProdotto: ".$this->idRecensione."Testo: ".$this->testo ;
       return $print;
    }


}