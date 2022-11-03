<?php

/**
 * La classe CRicerca viene utilizzata nella home page per la generazione
 * casuale di annunci
 * @package Control
 */
class CRicerca
{
    /**
     * Metodo che carica nella home page 12 annunci grazie all'utilizzo
     * della funzione rand che genera casualmente dei numeri
     * @return void
     */
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        //    $annunci = $pm::load('FAnnuncio', array(), 'data', '3');

        $numAnnunci = $pm::getRows('FAnnuncio', array(), '', '');

        /*    for($i = 0; $i < $numAnnunci; $i++) { // passo tre annunci nel carosello
                $annunci_home[$i] = $annunci[$i];
                $autore_annuncio[$i] = $pm::load('FUtente', array(['idFoto','=', $annunci[$i]->getIdVenditore()]));
                $immagini[$i] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunci[$i]->getIdFoto()]));
            } */

        //Funzione che sceglie casualmente gli annunci da far vedere sulla home
        $ran_num = array();
        $check = 0;

        for ($i = 0; $i < 12; $i++){
            while($check != 1){
                $new_num = rand(0, $numAnnunci - 1);
                if (!in_array($new_num, $ran_num)) {
                    $ran_num[] = $new_num;
                    $check = 1;
                }
            }

            $annunci_id = $pm::loadDefCol('FAnnuncio', array('idAnnuncio'));
            $annnunci_home[] = $pm::load('FAnnuncio', array(['idAnnuncio','=', $annunci_id[$ran_num[$i]]['idAnnuncio']]));
            $venditore_annuncio[] = $pm::load('FUtente', array(['idUser','=',$annnunci_home[$i]->getIdVenditore()]));
            $annunci_foto[] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annnunci_home[$i]->getIdFoto()]));
            $venditore_foto[] = $pm::load('FFotoUtente', array(['idFoto','=',$venditore_annuncio[$i]->getIdFoto()]));

            $check = 0;
        }

        $vSearch->showHome($annnunci_home, $venditore_annuncio, $annunci_foto, $venditore_foto);
    }
}
