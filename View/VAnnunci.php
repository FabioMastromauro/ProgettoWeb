<?php

class VAnnunci

    /**
     * Classe che si occupa dell'input-output dei contenuti riguardanti gli annunci
     * Inoltre fornisce a Smarty contenuti per popolare i template
     * @author Gruppo 7
     * @package View
     */
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
     * Metodo che permette di acquisire i dati immessi nel campo input, aventi name=titolo
     * @return string
     */
    static function getTitoloAnnuncio()
    {
        return strtoupper($_POST['title']);
    }

    /**
     * Metodo che permette di acquisire i dati immessi nel campo input, aventi name=descrizione
     * @return string
     */
    static function getDescrizioneAnnuncio()
    {
        return $_POST['descrizione'];
    }

    /**
     * Metodo che permette di acquistare i dati immessi nel campo input, aventi name=prezzo
     * @return mixed
     */
    static function getPrezzoAnnuncio()
    {
        return $_POST['prezzo'];
    }

    /**
     * Metodo che permette di acquisire i dati immessi nel campo input
     * @return mixed
     */
    static function getRicerca(){
        return $_POST['ricerca'];
    }

    /**
     * Metodo che permette di acquisire i dati immessi nel campo input, aventi name=categoria
     * @return mixed
     */
    static function getCategoriaAnnuncio()
    {
        return $_POST['categoria'];
    }

    /**
     * Metodo che mostra annunci casuali, sollecitabile cliccando sul tasto annunci
     * @param $annunci annunci cercati
     * @param $array annunci mostrati
     * @return void
     * @throws SmartyException
     */
    function showAnnunci($annunci, $array = null) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        if (is_array($annunci)) {
            $numero = rand(0, count($annunci) - 1);
            $this->smarty->assign('ran_num', $numero);
        }
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('array', $array);

        $this->smarty->display('annunci.tpl');
    }

    /**
     * Metodo richiamato quando di vuole modificare un determinato annuncio
     * @param $annuncio annuncio da modificare
     * @param $foto foto da sostituire/inserire
     * @param $descrizione descrizione annuncio
     * @param $categoria categoria annuncio
     * @param $prezzo prezzo prodotto
     * @return void
     * @throws SmartyException
     */
    public function modificaAnnuncio($annuncio, $foto, $descrizione, $categoria, $prezzo) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('annuncio', $annuncio);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('descrizione', $descrizione);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('prezzo', $prezzo);

        $this->smarty->display('annuncio_privato.tpl');
    }

    /**
     * Metodo che mostra la schermata che permette di creare un annuncio
     * @return void
     * @throws SmartyException
     */
    function showCreaAnnuncio(){
        $this->smarty->display('crea_annuncio.tpl');
    }

    /**
     * Metodo che permette di vedere i dettagli/info di un annuncio
     * @param EAnnuncio $annuncio annuncio in questione
     * @param $user autore dell'annuncio
     * @param $mod utente eventualmente caricato
     * @param $foto foto dell'annuncio
     * @param $immagine_autore immagine del profilo utente
     * @return void
     * @throws SmartyException
     */
    function showInfo(EAnnuncio $annuncio, $user, $mod, $foto, $immagine_autore) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $descrizione = explode('.', $annuncio->getDescrizione());

        $this->smarty->assign('mod', $mod);
        $this->smarty->assign('utente', $user);
        $this->smarty->assign('annuncio', $annuncio);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('descrizione', $descrizione);
        $this->smarty->assign('immagine_autore', $immagine_autore);

        $this->smarty->display('annuncio.tpl');
    }

    /**
     * Metodo che richiama la schermata di annunci nel caso la ricerca non andasse a buon fine
     * @param $annunci annunci da mostrare
     * @param $num_annunci numero annunci
     * @param $num_pagine numero pagine di annunci
     * @param $index indice che gestisce gli annunci per pagina
     * @param $immagini immagini degli annunci da mostrare
     * @param $cerca testo della ricerca
     * @param $tipoerr tipo errore
     * @param $input input
     * @param $categorie categorie
     * @return void
     * @throws SmartyException
     */
    function showAllErr($annunci, $num_annunci, $num_pagine, $index, $immagini, $cerca, $tipoerr, $input, $categorie){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        if ($cerca != null) $this->smarty->assign('searchMod', 'searchOn');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('num_annunci', $num_annunci);
        $this->smarty->assign('tipoerr', $tipoerr);
        $this->smarty->assign('input', $input);
        $this->smarty->assign('categorie', $categorie);

        $this->smarty->display('showAllRev.tpl');
    }

    /**
     * Metodo che richiama la schermata di annunci nel caso la ricerca andasse a buon fine
     * @param $annunci annunci
     * @param $num_pagine numero pagine
     * @param $index indice che gestisce gli annunci per pagina
     * @param $num_annunci numero annunci
     * @param $immagini immagini degli annunci da mostrare
     * @param $cerca testo della ricerca
     * @param $categorie categorie
     * @return void
     * @throws SmartyException
     */
    function showAll($annunci, $num_pagine,$index, $num_annunci, $immagini, $cerca, $categorie){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        if ($cerca != null) $this->smarty->assign('searchMod', 'searchOn');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('num_annunci', $num_annunci);
        $this->smarty->assign('categorie', $categorie);

        $this->smarty->display('showAllRev.tpl');
    }

    /**
     * Metodo che mostra la schermata di acquisto di un annuncio
     * @return void
     * @throws SmartyException
     */
    function schermataAcquisto() {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->display('purchase.tpl');
    }
}