<?php
/* La classe FUtente fornisce query per gli oggetti EUtente */
class FUtente extends FDatabase
{
public function __construct(){
    parent::__construct(); //richiama il costruttore di FDatabase
    $this->table='utente';
    $this->valori='(:$nome, :$cognome, :$username, :$password, :$email)';
    $this->class='FUtente';


    }
}