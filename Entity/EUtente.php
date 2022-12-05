<?php

/**
 * La classe EUtente contiene tutti gli attributi e metodi base che riguardano gli utenti
 * Gli attributi sono:
 * nome: nome dell'utente;
 * cognome: cognome dell'utente
 * email: email dell'utente
 * password: password dell'utente
 * idUser: id univoco dell'utente
 * idFoto: id della foto utente
 * dataIscrizione: data di iscrizione dell'utente
 * dataFineBan: data fine del ban utente se bannato
 * ban: utente bannato o no
 * admin: se utente admin o no
 * @access public
 * @author Gruppo 7
 * @package Entity
 */

class EUtente
{
    /**
     * Nome Utente
     * @var string|null
     */
    private  $nome;
    /**
     * Cognome Utente
     * @var string|null
     */
    private  $cognome;
    /**
     * id Utente univoco
     * @var int
     */
    private  $idUser;
    /**
     * email Utente
     * @var string|null
     */
    private  $email;
    /**
     * password Utente
     * @var string|null
     */
    private  $password;
    /**
     * id Foto Utente
     * @var int|null
     */
    private $idFoto;
    /**
     * data iscrizione Utente
     * @var |mixed|null
     */
    private  $dataIscrizione;
    /**
     * data fine ban Utente
     * @var |mixed|null
     */
    private  $dataFineBan;
    /**
     * ban Utente
     * @var mixed|null
     */
    private $ban;
    /**
     * admin Utente
     * @var bool|null
     */
    private  $admin;

    private $vemail;

    private $codice;

    //--------------------------------------------COSTRUTTORE---------------------------------------------------------------------------------------------------------------------------------------------

    public function __construct( $nome = null, string $cognome=null, string $email=null, $dataIscrizione=null, $dataFineBan=null, $ban=null, string $password=null,  $admin=null,$idUser=null, $vemail=null, $codice=null)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
        $this->dataIscrizione = $dataIscrizione;
        $this->dataFineBan = $dataFineBan;
        $this->ban = $ban;
        $this->admin = $admin;
        $this->idUser=$idUser;
        $this->vemail=$vemail;
        $this->codice=$codice;
    }



    // --------------------------------------------METODI GET E SET---------------------------------------------------------------------------------------------------------------------------------------------


    /**
     * @return mixed|null
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * @param mixed|null $codice
     */
    public function setCodice($codice): void
    {
        $this->codice = $codice;
    }

    /**
     * @return mixed|null
     */
    public function getVemail()
    {
        return $this->vemail;
    }

    /**
     * @param mixed|null $vemail
     */
    public function setVemail(mixed $vemail): void
    {
        $this->vemail = $vemail;
    }


    /**
     * @return int id Utente
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser id Utente
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string nome Utente
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome nome Utente
     */
    public function setNome( $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string cognome Utente
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome cognome Utente
     */
    public function setCognome( $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return string password Utente
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password password Utente
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string email Utente
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email email Utente
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int id foto Utente
     */

    /**
     * @return  data iscrizione Utente
     */
    public function getDataIscrizione()
    {
        return $this->dataIscrizione;
    }

    /**
     * @param  $dataIscrizione data iscrizione Utente
     */
    public function setDataIscrizione( $dataIscrizione): void
    {
        $this->dataIscrizione = $dataIscrizione;
    }

    /**
     * @return  data fine ban Utente
     */
    public function getDataFineBan()
    {
        return $this->dataFineBan;
    }

    /**
     * @param  $dataFineBan data fine ban Utente
     */
    public function setDataFineBan( $dataFineBan): void
    {
        $this->dataFineBan = $dataFineBan;
    }
    /**
     * @return  mixed $ban ban Utente
     */
    public function isBan(): bool
    {
        return $this->ban;
    }

    /**
     * @param mixed $ban ban Utente
     */
    public function setBan($ban): void
    {
        $this->ban = $ban;
    }
    /**
     * @return bool admin Utente
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param bool $admin admin Utente
     */
    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }



}
