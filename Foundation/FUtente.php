<?php

require_once 'include.php';

/**
 * La classe FUtente fornisce query per gli oggetti EUtente
 * @author Gruppo 3
 * @package Foundation
 */

class FUtente
{
    private static $tables="utenti";

      /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

     /** 
     * Funzione che verifica l'esistenza di un utente con quell'username e password
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $username 
     * @param  string $password
     * @return object $user
     */

    public static function ExistUserPass($username,$password){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."' AND "."password='".$password."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null){
             $user=new EUtente($result['username'],$result['password']);
             $user->setId($result['id']);
             return $user;
        }
        else return null;
    }

     /** 
     * Funzione che permette di verificare se esiste un utente con quell'username
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $username da cercare
     * @return bool 
     */

    public static function ExistUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

    public static function GetIdUser(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['username'])) 
        {
            $sql="SELECT id FROM ".static::getTables()." WHERE username='".$_SESSION['username']."';";
            $db=FDatabase::getInstance();
            $result=$db->exist($sql);
            if($result!=null) return $result["id"];
            else return 0;
        } else 
        {
            return 0;
        }
    }
}

