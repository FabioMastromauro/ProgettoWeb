<?php

class CRicerca
{
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistantManager'); //da modificare gli input

        $annuncio = $pm::load($parametri = array(),$attr = array(),$ordinamento = '',$limite = '','FAnnuncio'); //da modificare

        $num_post = $pm::getRows('FPost');

        for($i = 0; $i < $num_post; $i++){ // passo tre annuncio nel carosello
            $annunci_home[$i] = $annuncio[$i];
            $autore_annuncio[$i] = $pm::load('id',$annuncio[$i]->getAutore(),'FUtente');
            $immagini[$i] = $pm::load('id',$annuncio[$i]->getId_immagine(),'FImmagine');
        }

        //Funzione che sceglie casualmente gli annunci da far vedere sulla home
        $ran_num = array();
        $check = 0;

        for ($i = 0; $i < 5; $i++){
            while($check != 1){
                $check=0; // aggiunto
                $new_num = rand(0, $num_post - 1);
                if (!in_array($new_num, $ran_num)){
                    array_push($ran_num,$new_num); //  $ran_num[] = $new_num;
                    $check = 1;
                }
            }

            $post_id = $pm::loadDefCol('FPost', array('id'));
            $post_home[] = $pm::load(array('id'),array($post_id[$ran_num[$i]]['id']),'id','3','FPost');  // $post_home[] = $pm::load('FPost', array(['id', '=', $post_id[$ran_num[$i]]['id']]));
            $post_author[] = $pm::load(array('id'), array($post_home[$i]->getIdVenditore(),'id','3','FAnnuncio'));        //'FUtente', array(['id', '=', $post_home[$i]->getAutore()]));
            $post_immagini[] = $pm::load(array('id'),array($post_home[$i]->getIdAnnuncio()),'id','3','FAnnuncio');      //'FImmagine', array(['id', '=', $post_home[$i]->getId_immagine()]));
            //da vedere,  $immagini_autori[] = $pm::load('FImmagine', array(['id', '=', $post_author[$i]->getid_immagine()]));

            $check = 0;
        }

        $vSearch->showHome($annunci_home, $autore_annuncio, $immagini, $post_home, $post_author);//, $post_immagini);// $immagini_autori); //??
    }
}