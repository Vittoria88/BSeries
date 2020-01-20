<?php

require_once 'include.php';

/**
 * La classe EUtente contiene tutti gli attributi e metodi base riguardanti gli utenti. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -id: è un identificativo autoincrement, relativo al'utente;
 * -username: username account utente;
 * -password: password account utente;
 *  @author V&N
 *  @package Entity
 */ 
class EUtente
{
    /** id utente */
    private $id;
    /** username */
    private $username;
    /** password account */
    private $password;

    public function __construct($un=null,$pass=null){
        $this->username=$un;
        $this->password=$pass;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valUsername($val){
        if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$val)){
            return false;
           }
        return true;
    }
 
       /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valPassword($val){
        if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$val)){
            return false;
           }
        return true;
    }
        /**
     * @param int $id utente
     */
    public function setId($id){
        $this->id=$id;
    }
    /**
     * @return int id utente
     */
    public function getId(){
        return $this->id;
    }
        /**
     * @return string username
     */
    public function getUserName(){
        return $this->username;
    }
    /**
     * @return string password
     */
    public function getPass(){
        return $this->password;
    }
}
