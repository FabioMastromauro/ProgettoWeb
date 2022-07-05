<?php
/**La classe EFoto contiene i dati relativi alle foto
 * @author Gruppo 7
 *@package Entity
 * **/
class EFoto
{
    /**id della foto */
    private int $idFoto;
    /**nome della foto */
    private string $nomeFoto;
    /**altezza foto */
    private int $altezza;
    /**larghezza foto */
    private int $larghezza;
    /**mime tipe della foto */
    private $tipo;
    /**data di caricamento della foto */
    private $data;

    /**
     * COSTRUTTORE
     * @param int $idFoto
     * @param string $nomeFoto
     * @param int $altezza
     * @param int $larghezza
     * @param $tipo
     * @param $data
     */
    public function __construct(int $idFoto, string $nomeFoto, int $altezza, int $larghezza, $tipo, $data)
    {
        $this->idFoto = $idFoto;
        $this->nomeFoto = $nomeFoto;
        $this->altezza = $altezza;
        $this->larghezza = $larghezza;
        $this->tipo = $tipo;
        $this->data = $data;
    }


    /**
     * @return int id foto
     */
    public function getIdFoto(): int
    {
        return $this->idFoto;
    }

    /**
     * @param int $idFoto id foto
     */
    public function setIdFoto(int $idFoto): void
    {
        $this->idFoto = $idFoto;
    }

    /**
     * @return string nome foto
     */
    public function getNomeFoto(): string
    {
        return $this->nomeFoto;
    }

    /**
     * @param string $nomeFoto nome foto
     */
    public function setNomeFoto(string $nomeFoto): void
    {
        $this->nomeFoto = $nomeFoto;
    }

    /**
     * @return int altezza foto
     */
    public function getAltezza(): int
    {
        return $this->altezza;
    }

    /**
     * @param int $altezza altezza foto
     */
    public function setAltezza(int $altezza): void
    {
        $this->altezza = $altezza;
    }

    /**
     * @return int larghezza foto
     */
    public function getLarghezza(): int
    {
        return $this->larghezza;
    }

    /**
     * @param int $larghezza larghezza foto
     */
    public function setLarghezza(int $larghezza): void
    {
        $this->larghezza = $larghezza;
    }

    /**
     * @return mixed mime type
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo mime type
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed data foto
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data data foto
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}