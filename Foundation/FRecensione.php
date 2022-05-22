<?php

class FRecensione extends FDatabase{
    public function __construct(){
        parent::__construct(); //richiama il costruttore di FDatababse
        $this->table = 'recensione';
        $this->valori = '()';



}

}