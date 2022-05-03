<?php

class User
{
    private string $nome;
    private string $cognome;
    private string $username;
    private string $password;
    private string $email;
    private array(Annuncio $annuncio) annunci;
    private array(Recensione $recensione) recensioni;
    private array(Annuncio $annuncio) $storico;
}