<?php

class EVerifica
{

    private $idVerifica;
    private $codice;
    private $tempo;
    private $email;

    /**
     * @param $idVerifica
     * @param $codice
     * @param $tempo
     * @param $email
     */
    public function __construct($idVerifica=null, $codice=null, $tempo=null, $email=null)
    {
        $this->idVerifica = $idVerifica;
        $this->codice = $codice;
        $this->tempo = $tempo;
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getIdVerifica()
    {
        return $this->idVerifica;
    }

    /**
     * @param mixed $idVerifica
     */
    public function setIdVerifica($idVerifica): void
    {
        $this->idVerifica = $idVerifica;
    }

    /**
     * @return mixed
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * @param mixed $codice
     */
    public function setCodice($codice): void
    {
        $this->codice = $codice;
    }

    /**
     * @return mixed
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * @param mixed $tempo
     */
    public function setTempo($tempo): void
    {
        $this->tempo = $tempo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }





}