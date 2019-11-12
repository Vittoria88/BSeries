<?php

require_once 'include.php';

/**
 * La classe FRegistrazione fornisce query per gli oggetti EUtente
 * @author Gruppo 3
 * @package Foundation
 */

class FRegistrazione
{
    private static $tables="utenti";
    private static $values="(:id,:username,:nome,:cognome,:password,:email)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EUtente $user user i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt,ERegistrazione $user){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':username', $user->getUserName(), PDO::PARAM_STR); 
        $stmt->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $user->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $user->getPass(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
    }
  /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

     /**
     * 
     * questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }


    public static function store($user){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FRegistrazione",$user);
        if($id) return $id;
        else return null;
    }   
    
    public static function ExistUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }
}

