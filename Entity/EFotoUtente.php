<?php

class EFotoUtente extends EFoto implements JsonSerializable
{
    /**
     * nome dell'utente
     * @AttributeType string
     */
    private $nomeU;

    /**
     * @param $nomeU
     */
    public function __construct($nomeFoto,$nomeU)
    {
        parent::__construct($nomeFoto);
        $this->nomeU = $nomeU;
    }

    /**
     * @return mixed
     */
    public function getNomeU()
    {
        return $this->nomeU;
    }

    /**
     * @param mixed $nomeU
     */
    public function setNomeU($nomeU): void
    {
        $this->nomeU = $nomeU;
    }

    public function jsonSerialize ()
    {
        return
            [
                'id'   => $this->getIdFoto(),
                'nFoto' => $this->getNomeFoto(),
                'altezza'   => $this->getAltezza(),
                'larghezza'   => $this->getLarghezza(),
                'tipo'  =>  $this->getTipo(),
                'data'  =>  $this->getData(),
                'nomeU' => $this->getNomeU()
            ];
    }


}