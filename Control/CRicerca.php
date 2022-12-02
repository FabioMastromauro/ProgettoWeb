<?php

/**
 * La classe CRicerca si occupa del caricamento degli annunci nella homepage
 * @author Gruppo7
 * @package Control
 */
class CRicerca
{
    /**
     * Metodo utilizzato per il caricamento degli annunci nella home che implementa
     * un sistema di refresh degli annunci ad ogni caricamento della pagina
     * @return void
     */
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager');


        $numAnnunci = $pm::getRows('FAnnuncio');

     for ($i = 0; $i <$numAnnunci ; $i++) {

         $annunci_id = $pm::loadDefCol('FAnnuncio', array('idAnnuncio'));
         $annunci_home[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $annunci_id[$i]['idAnnuncio']]));
         $venditore_annuncio[] = $pm::load('FUtente', array(['idUser', '=', $annunci_home[$i]->getIdVenditore()]));
         $annunci_foto[] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_home[$i]->getIdAnnuncio()]));
         if (!is_array($annunci_foto[$i])) $annunci_foto[$i]=array($annunci_foto[$i]);
     }
        $vSearch->showHome($annunci_home, $venditore_annuncio, $annunci_foto);
    }
}