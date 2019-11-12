<?php

require_once 'include.php';

/**
 * La classe ESerie contiene tutti gli attributi e metodi base riguardanti l'inserimento dei likes per la serie. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -id: è un identificativo autoincrement, relativo al like;
 * -idserie: id univoco della serie;
 * -idutente: id univoco dell'utente che inserisce il like;
 *  @author Vittoria
 *  @package Entity
 */
class ESerie
{
    /** id like */
    private $id;
    /** id serie */
    private $idserie;
    /** idutente */
    private $idutente;
    /** genere */
    private $genere;

    /** costruttore */
    public function __construct($idserie = null, $idutente = null, $genere = null)
    {
        $this->idserie = $idserie;
        $this->idutente = $idutente;
        $this->genere = $genere;
    }
    /**
     * @return int id like
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $idserie id serie
     */
    public function getIdSerie()
    {
        return $this->idserie;
    }
    /**
     * @param int $idutente id utente
     */
    public function getIdUtente()
    {
        return $this->idutente;
    }
    /**
     * @param int $genere genere serie
     */
    public function getGenere()
    {
        return $this->genere;
    }
}
