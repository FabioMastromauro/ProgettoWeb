<?php

class CAnnuncio
{

    static function esplora($id=null){
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistantManager');

        if ($id != null){
            $annunci = $pm::load('FAnnunci',array('id'),array($id),'id',1);
            $array = self::homeAnnunci($annunci); //da creare
            $view->showAnnunci($annunci, $array);
        } else {
            $annunci = $pm::load('FAnnunci',array('id'),array($id),'id',1);
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        }
    }


    static function homeAnnunci($annunci){
        $pm = USingleton::getInstance('FPersistantManager');
        if($annunci!=null){
            if(is_array($annunci)){
                for ($i = 0; $i < count($annunci); $i++){
                    $annunci_home[$i] = $annunci[$i];
                    $autori_annunci[$i] = $pm::load('FUtente', array('id'), array($annunci[$i]->getAutore()),'id',1);
                    $immagini_home[$i] = $pm::load('FImmagine',array('id'), array($annunci[$i]->getImmagine()),'id',1);
                   // $immagini_autore[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));
                }
            }
            else{
                $annunci_home = $annunci;
                $autori_annunci = $pm::load('FUtente', array('id'), array($annunci->getAutore()),'id',1);
                $immagini_home = $pm::load('FFotoAnnuncio',array('id'), array($annunci->getIdFoto()),'id',1);
                $immagini_autore = $pm::load('FFotoUtente', array('id'), array($annunci->getIdFoto()),'id',1);
            }
        }
        return array($annunci_home, $autori_annunci, $immagini_home, $immagini_autore);
    }
}