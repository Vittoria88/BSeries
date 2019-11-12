<?php

require_once 'include.php';

/**
 * La classe EUtente contiene tutti gli attributi e metodi base riguardanti gli utenti. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -id: è un identificativo autoincrement, relativo al'utente;
 * -username: username account utente;
 * -password: password account;
 * -nome: nome dell'utente;
 * -cognome: cognome dell'utente;
 * -email: email utente;
 *  @author Gruppo 3
 *  @package Entity
 */
class ERegistrazione
{
    /** id utente */
    private $id;
    /** username */
    private $username;
    /** nome utente */
    private $nome;
    /** cognome utente */
    private $cognome;
    /** password account */
    private $password;
    /** email utente */
    private $email;
    /** costruttore */
    public function __construct($un = null, $pass = null, $nome = null, $cognome = null, $em = null)
    {
        $this->username = $un;
        $this->password = $pass;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $em;
    }
    /**
     * @return int id utente
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string nome utente
     */
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * @return string cognome utente
     */
    public function getCognome()
    {
        return $this->cognome;
    }
    /**
     * @return string username
     */
    public function getUserName()
    {
        return $this->username;
    }
    /**
     * @return string password
     */
    public function getPass()
    {
        return $this->password;
    }
    /**
     * @return string email
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param int $id utente
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param string $un username
     */
    public function setUserName($un)
    {
        $this->username = $un;
    }
    /**
     * @param string $pass password
     */
    public function setPass($pass)
    {
        $this->password = $pass;
    }
    /**
     * @param string $em email
     */
    public function setEmail($em)
    {
        $this->email = $em;
    }
    /**
     * @param string $nome nome 
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    /**
     * @param string $cognome cognome
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }
    /********************Validazione**************************/

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valNome($val): bool
    {
        $replace = array(" ", "'");
        if (!preg_match("/^([a-zA-Z0-9_]{3,30})$/", str_replace($replace, '', $val))) {
            return false;
        } else return true;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valCognome($val): bool
    {
        $replace = array(" ", "'");
        if (!preg_match("/^([a-zA-Z0-9_]{3,30})$/", str_replace($replace, '', $val))) {
            return false;
        } else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valUsername($val): bool
    {
        $replace = array(" ", "'");
        if (!preg_match("/^([a-zA-Z0-9_]{3,30})$/", str_replace($replace, '', $val))) {
            return false;
        } else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valPassword($val): bool
    {
        $replace = array(" ", "'");
        if (!preg_match("/^([a-zA-Z0-9_]{8,30})$/", str_replace($replace, '', $val))) {
            return false;
        } else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valEmail($val): bool
    {
        if (filter_var($val, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }

}
