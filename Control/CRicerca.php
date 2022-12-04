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
        $ran_num = array();
        $check = 0;
if($numAnnunci!=0) {
    for ($i = 0; $i < $numAnnunci; $i++) {
        while ($check != 1) {
            $new_num = rand(0, $numAnnunci - 1);
            if (!in_array($new_num, $ran_num)) {
                $ran_num[] = $new_num;
                $check = 1;
            }
        }

        $annunci_id = $pm::loadDefCol('FAnnuncio', array('idAnnuncio'));
        if ($numAnnunci == 1) $annunci_home[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $annunci_id['idAnnuncio']]));
        else $annunci_home[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $annunci_id[$ran_num[$i]]['idAnnuncio']]));

        $venditore_annuncio[] = $pm::load('FUtente', array(['idUser', '=', $annunci_home[$i]->getIdVenditore()]));
        $annunci_foto[] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_home[$i]->getIdAnnuncio()]));
        if (!is_array($annunci_foto[$i])) $annunci_foto[$i] = array($annunci_foto[$i]);
        $check = 0;

    }
    $vSearch->showHome($annunci_home, $venditore_annuncio, $annunci_foto);
} else     $vSearch->showHome(null, null, null  );

    }

}