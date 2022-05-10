<?php

class FDatabase
{
    /* per la connessione alla PDO */
    protected $db;

    /* tabella degli elementi*/
    protected $table;

    /* nome della classe da mettere nel database */
    protected $class;

    /* valori da mettere nel database */
    protected $values;
}