<?php

/**
 * La classe EUtente contiene tutti gli attributi e i metodi relativi agli utenti
 * Contiene i seguenti attributi e i relativi metodi get e set:
 * - nome: nome dell'utente
 * - cognome: cognome dell'utente
 * - username: username dell'utente
 * - password: password dell'utente
 * - email: email dell'utente
 * - annunci: annunci dell'utente
 * - recensioni: recensioni dell'utente
 * - storico: storico degli acquisti dell'utente
 * - idUser: id dell'utente
 * - fotoUtente: foto dell'utente
 * @author Gruppo 7
 * @package Entity
 */
class EUtente
{
    private string $nome;
    private string $cognome;
    private string $username;
    private string $password;
    private string $email;
    private array $annunci;
    private array $recensioni;
    private array $storico;
    private int $idUser;
    private EFoto $fotoUtente;
    /**
     * COSTRUTTORE
     * @param string $nome
     * @param string $cognome
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(string $nome, string $cognome, string $username, string $password, string $email)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return int id utente
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser id utente
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return EFoto foto utente
     */
    public function getFotoUtente(): EFoto
    {
        return $this->fotoUtente;
    }

    /**
     * @param EFoto $fotoUtente foto utente
     */
    public function setFotoUtente(EFoto $fotoUtente): void
    {
        $this->fotoUtente = $fotoUtente;
    }

    /**
     * @return string nome utente
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome nome utente
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string cognome utente
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome cognome utente
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return string username utente
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username username utente
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string password utente
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password password utente
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string email utente
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email email utente
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return array annunci utente
     */
    public function getAnnunci(): array
    {
        return $this->annunci;
    }

    /**
     * @param array $annunci annunci utente
     */
    public function setAnnunci(array $annunci): void
    {
        $this->annunci = $annunci;
    }

    /**
     * @return array recensioni utente
     */
    public function getRecensioni(): array
    {
        return $this->recensioni;
    }

    /**
     * @param array $recensioni recensioni utente
     */
    public function setRecensioni(array $recensioni): void
    {
        $this->recensioni = $recensioni;
    }

    /**
     * @return array storico degli acquisti
     */
    public function getStorico(): array
    {
        return $this->storico;
    }

    /**
     * @param array $storico storico degli acquisti
     */
    public function setStorico(array $storico): void
    {
        $this->storico = $storico;
    }

    /**
     * Aggiunge una nuova recensione all'utente
     */
    public function addRecensione($r): void{
        array_push($this->recensioni, $r);
    }

    /**
     * Aggiunge un nuovo annuncio all'utente
     */
    public function addAnnuncio($a): void{
        array_push($this->annunci, $a);
    }

    /**
     * Aggiunge un nuovo acquisto allo storico
     */
    public function addStorico($a): void{
        array_push($this->storico, $a);
    }

    /**
     * rimuove una recensione
     */
    public function remRecensione($id): void{
        foreach ($this->recensioni as $r => $recensione){
            if ($recensione->getIdRecensione()==$id){
                unset($this->recensioni[$r]);
            }
        }
    }

    /**
     * rimuove un annuncio
     */
    public function remAnnuncio($id): void{
        foreach ($this->annunci as $a => $annuncio){
            if ($annuncio->getIdAnnuncio()==$id){
                unset($this->annunci[$a]);
            }
        }
    }

}