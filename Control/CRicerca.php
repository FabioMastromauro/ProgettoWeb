<?php

class CRicerca
{
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        $annunci = $pm::load('FAnnuncio', array(), 'data', '3');

        $numAnnunci = $pm::getRows('FAnnuncio');

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
            $annnunci_home[] = $pm::load('FAnnuncio', array(['idAnnuncio','=', $annunci_id[$ran_num[$i]]['id']]));
            $annunci_venditore[] = $pm::load('FUtente', array(['idUser','=',$annnunci_home[$i]->getIdVenditore()]));
            $annunci_foto[] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annnunci_home[$i]->getIdFoto()]));
            $venditore_foto[] = $pm::load('FFotoUtente', array(['idFoto','=',$annunci_venditore[$i]->getIdFoto()]));

            $check = 0;
        }

        $vSearch->showHome($annunci_home, $autore_annuncio, $immagini, $annnunci_home, $annunci_venditore);//, $annunci_foto);// $venditore_foto); //??
    }
}