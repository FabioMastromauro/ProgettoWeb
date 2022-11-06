<?php

class CRicerca
{
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager');


        $numAnnunci = $pm::getRows('FAnnuncio');


        //Funzione che sceglie casualmente gli annunci da far vedere sulla home
        $ran_num = array();
        $check = 0;

        for ($i = 0; $i < 2; $i++){

                while($check!=1) {


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