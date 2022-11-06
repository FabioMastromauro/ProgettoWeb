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

class EUtente implements JsonSerializable
{
    /**
     * Nome Utente
     * @var string|null
     */
    private string $nome;
    /**
     * Cognome Utente
     * @var string|null
     */
    private string $cognome;
    /**
     * id Utente univoco
     * @var int
     */
    private int $idUser;
    /**
     * email Utente
     * @var string|null
     */
    private string $email;
    /**
     * password Utente
     * @var string|null
     */
    private string $password;
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
    private bool $admin;

    //--------------------------------------------COSTRUTTORE---------------------------------------------------------------------------------------------------------------------------------------------

    public function __construct(string $nome = null, string $cognome=null, string $email=null, $idFoto=null, $dataIscrizione=null, $dataFineBan=null, $ban=null, string $password=null, bool $admin=null)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
        $this->idFoto = $idFoto;
        $this->dataIscrizione = $dataIscrizione;
        $this->dataFineBan = $dataFineBan;
        $this->ban = $ban;
        $this->admin = $admin;
    }

    // --------------------------------------------METODI GET E SET---------------------------------------------------------------------------------------------------------------------------------------------


    /**
     * @return int id Utente
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser id Utente
     */
    public function setIdUser( $idUser): void
    {
        $this->idUser = $idUser;
    }
    /**
     * @return string nome Utente
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome nome Utente
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string cognome Utente
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome cognome Utente
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return string password Utente
     */
    public function getPassword(): string
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
    public function getEmail(): string
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
    public function getIdFoto()
    {
        return $this->idFoto;
    }

    /**
     * @param $idFoto id foto Utente
     */
    public function setIdFoto($idFoto): void
    {
        $this->idFoto = $idFoto;
    }

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
    public function getAdmin(): bool
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



    public function jsonSerialize()
    {
        return
            [
                'nome'   => $this->getNome(),
                'cognome' => $this->getCognome(),
                'idUser'   => $this->getIdUser(),
                'email'   => $this->getEmail(),
                'password'   => $this->getPassword(),
                'idFoto'   => $this->getIdFoto(),
                'dataIscrizione'   => $this->getDataIscrizione(),
                'dataFineBan'   => $this->getDataFineBan(),
                'ban'   => $this->isBan(),
                'admin' => $this->getAdmin()
            ];
    }
}
