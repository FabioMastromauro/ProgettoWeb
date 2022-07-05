<?php

class EUtente implements JsonSerializable
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
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return EFoto
     */
    public function getFotoUtente(): EFoto
    {
        return $this->fotoUtente;
    }

    /**
     * @param EFoto $fotoUtente
     */
    public function setFotoUtente(EFoto $fotoUtente): void
    {
        $this->fotoUtente = $fotoUtente;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * @param string $cognome
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getAnnunci(): array
    {
        return $this->annunci;
    }

    /**
     * @param array $annunci
     */
    public function setAnnunci(array $annunci): void
    {
        $this->annunci = $annunci;
    }

    /**
     * @return array
     */
    public function getRecensioni(): array
    {
        return $this->recensioni;
    }

    /**
     * @param array $recensioni
     */
    public function setRecensioni(array $recensioni): void
    {
        $this->recensioni = $recensioni;
    }

    /**
     * @return array
     */
    public function getStorico(): array
    {
        return $this->storico;
    }

    /**
     * @param array $storico
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
     * Aggiunge una nuova annuncio all'utente
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

    public function remRecensione($id): void{
        foreach ($this->recensioni as $r => $recensione){
            if ($recensione->getIdRecensione()==$id){
                unset($this->recensioni[$r]);
            }
        }
    }

    public function remAnnuncio($id): void{
        foreach ($this->annunci as $a => $annuncio){
            if ($annuncio->getIdAnnuncio()==$id){
                unset($this->annunci[$a]);
            }
        }
    }

    public function jsonSerialize()
    {
        return
            [
                'nome'   => $this->getNome(),
                'cognome' => $this->getCognome(),
                'username'   => $this->getUsername(),
                'password'   => $this->getPassword(),
                'email'   => $this->getEmail(),
                'annunciA'   => $this->getAnnunci(),
                'recensioniA'   => $this->getRecensioni(),
                'storicoA'   => $this->getStorico(),
                'idUser'   => $this->getIdUser(),
                'fotoutente'   => $this->getFotoUtente()
            ];
    }
}
