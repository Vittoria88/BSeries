<?php

require_once 'include.php';
/**
 *  La classe ERecensione contiene tutti gli attributi e metodi base riguardanti i commenti relativi
 *  alle serietv. 
 *  Contiene i seguenti attributi (e i relativi metodi):
 * - id: è un identificativo autoincrement, relativo al commento;
 * - idserie: id della serietv commentata;
 * - username: username dell'utente che commenta la serietv;
 * - comm: parte testuale della recensione della serietv;
 * - voto: voto numerico della recensione della serietv;
 * - data: data della recensione della serietv;
 * @author V&N
 * @package Entity
 */

class ERecensione
{
    /** id commento*/
    private $id;
    /** id serie */
    private $idserie;
    /** username */
    private $username;
    /** testo */
    private $comm;
    /** voto */
    private $voto;
    /** data */
    private $data;

    /** costruttore */
    public function __construct($idserie= null, $username = null, $comm = null, $voto = null, $data = null)
    {
        $this->idserie = $idserie;
        $this->username = $username;
        $this->comm = $comm;
        $this->voto = $voto;
        $this->data = $data;
    }
    /**
     * @return int id recensione
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string id serie
     */
    public function getIdserie()
    {
        return $this->idserie;
    }
    /**
     * @return string username
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @return string commento
     */
    public function getComm()
    {
        return $this->comm;
    }
    /**
     * @return string voto
     */
    public function getVoto()
    {
        return $this->voto;
    }
        /**
     * @return date data
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param int $id recensione
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param int $idserie idserie
     */
    public function setIdserie($idserie)
    {
        $this->idserie = $idserie;
    }
    /**
     * @param string $username username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @param string $comm
     */
    public function setComm($comm)
    {
        $this->comm = $comm;
    }
    /**
     * @param string $voto
     */
    public function setVoto($voto)
    {
        $this->voto = $voto;
    }
        /**
     * @param date $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}