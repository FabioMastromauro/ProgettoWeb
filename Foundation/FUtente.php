<?php
/* La classe FUtente fornisce query per gli oggetti EUtente */
class FUtente extends FDatabase
{
public function __construct(){
    parent::__construct();
    $this->table='utente';
    $this->valori='(:$nome, :$cognome, :$username, :$password, :$email)';
    $this->class='FUtente';

    }
}