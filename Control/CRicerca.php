<?php

class CRicerca
{
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager'); //da modificare gli input

        $annunci = $pm::load('FAnnuncio', $parametri = array(),$attr = array(), 'data', '3');

        $numAnnunci = $pm::getRows('FAnnuncio');

        for($i = 0; $i < $numAnnunci; $i++) { // passo tre annunci nel carosello
            $annunci_home[$i] = $annunci[$i];
            $autore_annuncio[$i] = $pm::load('FUtente', array(['id','=', $annunci[$i]->getIdVenditore()]));
            $immagini[$i] = $pm::load('FFotoAnnuncio', array(['id','=',$annunci[$i]->getIdFoto()]));
        }

        //Funzione che sceglie casualmente gli annunci da far vedere sulla home
        $ran_num = array();
        $check = 0;

        for ($i = 0; $i < 5; $i++){
            while($check != 1){
                $check=0; // aggiunto
                $new_num = rand(0, $numAnnunci - 1);
                if (!in_array($new_num, $ran_num)){
                    $ran_num[] = $new_num;
                    $check = 1;
                }
            }

            // $post_id = $pm::loadDefCol('FAnnuncio', array('id'));
            $annnunciHome[] = $pm::load('FAnnuncio', array(['id','=',$post_id[$ran_num[$i]]['id']]));          // $annnunciHome[] = $pm::load('FPost', array(['id', '=', $post_id[$ran_num[$i]]['id']]));
            $annunciVenditore[] = $pm::load('FUtente', array(['id','=',$annnunciHome[$i]->getIdVenditore()]));      //'FUtente', array(['id', '=', $annnunciHome[$i]->getAutore()]));
            $annunciFoto[] = $pm::load('FFotoAnnuncio', array(['id','=',$annnunciHome[$i]->getIdFoto()]));   //'FImmagine', array(['id', '=', $annnunciHome[$i]->getId_immagine()]));
            $venditoreFoto[] = $pm::load('FFotoUtente', array(['id','=',$annunciVenditore[$i]->getIdFoto()]));         //('FImmagine', array(['id', '=', $annunciVenditore[$i]->getid_immagine()]));

            $check = 0;
        }

        $vSearch->showHome($annunci_home, $autore_annuncio, $immagini, $annnunciHome, $annunciVenditore);//, $annunciFoto);// $venditoreFoto); //??
    }
}