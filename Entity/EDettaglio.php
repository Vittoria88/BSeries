<?php
require_once 'include.php';
/**
  * La classe EDettaglio contiene tutti gli attributi e metodi base riguardanti le serietv. 
 *  Contiene i seguenti attributi (e i relativi metodi):
 * - id: è un identificativo autoincrement, relativo alla serietv;
 * - titolo: titolo della serietv;
 * - genere: genere della serietv;
 * - stagioni: stagioni della serietv;
 * - autore: autore della serietv;
 * - trama: trama della serietv;
 * - copertina: immagine di copertina della serietv;
 * - attore1: attore protagonista della serietv;
 * - personaggio1: doppiatore o personaggio animato della serietv;
 * - attore2: attore secondario della serietv;
 * - personaggio2: doppiatore o personaggio animato della serietv;
 * - attore3: attore secondario della serietv;
 * - personaggio3: doppiatore o personaggio animato della serietv;
 * @author V&N
 * @package Entity
 */
class EDettaglio
{

    private $id; //type int
    private $titolo; //type string
    private $genere;//type string
    private $stagioni; //type int
    private $autore;//type string
    private $trama; // type string
    private $copertina;//type string
    private $attore1; // type string
    private $personaggio1;// type string
    private $attore2;// type string
    private $personaggio2;// type string
    private $attore3;// type string
    private $personaggio3;// type string

    /**
     * EDettaglio constructor.
     * @param $id
     * @param $titolo
     * @param $genere
     * @param $mediavoti
     * @param $stagioni
     * @param $autore
     * @param $trama
     * @param $copertina
     * @param $attore1
     * @param $personaggio1
     * @param $attore2
     * @param $personaggio2
     * @param $attore3
     * @param $personaggio3
     */
    public function __construct( $titolo, $genere,  $stagioni, $autore, $trama, $copertina, $attore1, $personaggio1, $attore2, $personaggio2, $attore3, $personaggio3)
    {
        $this->titolo = $titolo;
        $this->genere = $genere;
        $this->stagioni = $stagioni;
        $this->autore = $autore;
        $this->trama = $trama;
        $this->copertina = $copertina;
        $this->attore1 = $attore1;
        $this->personaggio1 = $personaggio1;
        $this->attore2 = $attore2;
        $this->personaggio2 = $personaggio2;
        $this->attore3 = $attore3;
        $this->personaggio3 = $personaggio3;
    }

    /**
     * @return mixed $id della serietv
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id della serietv
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed $titolo della serietv
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @param mixed $titolo della serietv
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    }

    /**
     * @return mixed $genere della serietv
     */
    public function getGenere()
    {
        return $this->genere;
    }

    /**
     * @param mixed $genere della serietv
     */
    public function setGenere($genere)
    {
        $this->genere = $genere;
    }

    /**
     * @return mixed $stagioni della serietv
     */
    public function getStagioni()
    {
        return $this->stagioni;
    }

    /**
     * @param mixed $stagioni della serietv
     */
    public function setStagioni($stagioni)
    {
        $this->stagioni = $stagioni;
    }

    /**
     * @return mixed $autore della serietv
     */
    public function getAutore()
    {
        return $this->autore;
    }

    /**
     * @param mixed $autore della serietv
     */
    public function setAutore($autore)
    {
        $this->autore = $autore;
    }

    /**
     * @return mixed $trama della serietv
     */
    public function getTrama()
    {
        return $this->trama;
    }

    /**
     * @param mixed $trama della serietv
     */
    public function setTrama($trama)
    {
        $this->trama = $trama;
    }

    /**
     * @return mixed $copertina della serietv
     */
    public function getCopertina()
    {
        return $this->copertina;
    }

    /**
     * @param mixed $copertina della serietv
     */
    public function setCopertina($copertina)
    {
        $this->copertina = $copertina;
    }

    /**
     * @return mixed $attore1 della serietv
     */
    public function getAttore1()
    {
        return $this->attore1;
    }

    /**
     * @param mixed $attore1 della serietv
     */
    public function setAttore1($attore1)
    {
        $this->attore1 = $attore1;
    }

    /**
     * @return mixed $personaggio1 della serietv
     */
    public function getPersonaggio1()
    {
        return $this->personaggio1;
    }

    /**
     * @param mixed $personaggio1 della serietv
     */
    public function setPersonaggio1($personaggio1)
    {
        $this->personaggio1 = $personaggio1;
    }

    /**
     * @return mixed $attore2 della serietv
     */
    public function getAttore2()
    {
        return $this->attore2;
    }

    /**
     * @param mixed $attore2 della serietv
     */
    public function setAttore2($attore2)
    {
        $this->attore2 = $attore2;
    }

    /**
     * @return mixed $personaggio2 della serietv
     */
    public function getPersonaggio2()
    {
        return $this->personaggio2;
    }

    /**
     * @param mixed $personaggio2 della serietv
     */
    public function setPersonaggio2($personaggio2)
    {
        $this->personaggio2 = $personaggio2;
    }

    /**
     * @return mixed $attore3 della serietv
     */
    public function getAttore3()
    {
        return $this->attore3;
    }

    /**
     * @param mixed $attore3 della serietv
     */
    public function setAttore3($attore3)
    {
        $this->attore3 = $attore3;
    }

    /**
     * @return mixed $personaggio3 della serietv
     */
    public function getPersonaggio3()
    {
        return $this->personaggio3;
    }

    /**
     * @param mixed $personaggio3 della serietv
     */ 
    public function setPersonaggio3($personaggio3)
    {
        $this->personaggio3 = $personaggio3;
    }


}