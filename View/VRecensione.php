<?php

/**
 * Classe che si occupa dell'input-output dei contenuti riguardanti le recensioni
 * @author Gruppo 7
 * @package View
 */
class VRecensione
{
    private $smarty;

    /**
     * Costruttore che configura/inizializza smarty
     */
    public function __construct()
    {
       $this->smarty = StartSmarty::configuration();
    }

    /**
     * Metodo che restituisce il commento della recensione che si vuole scrivere
     * Inviato con metodd POST
     * @return string
     */
    static function getCommento()
    {
        return strtoupper($_POST['commento']);
    }

    /**
     * Metodo che restituisce la valutazione della recensione che si vuole valutare
     * Inviato con metodo POST
     * @return string
     */
    static function getValutazione()
    {
        return strtoupper($_POST['valutazione']);
    }

    /**
     * Metodo per recuperare i filtri inseriti dall'amministratore
     * @return array con i filtri
     */
    public function recuperaFiltri(){
        $filtri = array();
        if(isset($_POST['last'])){
            $filtri['last'] = $_POST['last'];
        } else {
            $filtri['last'] = null;
        }

        if(isset($_POST['parola'])){
            $filtri['parola'] = $_POST['parola'];
        } else{
            $filtri['parola'] = null;
        }
        return $filtri;
    }

    /**
     * Metodo che recupera l'array di idRecensione da bannare inviati con la form
     * @return array|mixed array di id inseriti
     */
    public function recuperaRecensioni(){
        $arrayid=array();
        if(isset($_POST['recensione'])){
            $arrayid = $_POST['recensione']; //recupero array di id recensioni inviati con la form
        }
        return $arrayid;
    }

    /**
     * Funzione per mostrare le recensioni recuperati secondo i filtri
     * @param $recensione recensione da mostrare
     */
    public function mostraRecensione($rec, $arrrecensioni){
        //comunico a smarty di mostrare le recensioni

        $this->smarty->assign('com',$rec);
        $this->smarty->assign('commenti',$arrrecensioni);
        $this->smarty->display('BannaRecensione.tpl');

    }
}