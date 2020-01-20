<?php

require_once 'include.php';

/**
 * La classe FRecensioni fornisce query per le serie tv
 * @author V&N
 * @package Foundation
 */

class FRecensioni
{
    private static $tables="recensioni";
    private static $values="(:id,:idserie,:username,:comm,:voto,:data)";

     /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }
   
    public function __construct(){}

     /**
     * 
     * questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }
    public static function bind($stmt,ERecensione $rece){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); 
        $stmt->bindValue(':idserie', $rece->getIdSerie(), PDO::PARAM_STR); 
        $stmt->bindValue(':username', $rece->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':comm', $rece->getComm(), PDO::PARAM_STR);
        $stmt->bindValue(':voto', $rece->getVoto(), PDO::PARAM_INT); 
        $stmt->bindValue(':data', $rece->getData(), PDO::PARAM_STR);
    }
  
    /*
    la funzione apriRecensione restituisce i risultati della query e viene costriuto 
    un array di oggetti ERecensione.
    */
    public static function apriRecensione($ID){
        $sql="SELECT * FROM ".static::getTables()." WHERE IDSERIE=".$ID." ORDER BY DATA DESC";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            for($i=0; $i<count($result); $i++){
                $recensione[]=new ERecensione($result[$i]['idserie'] , $result[$i]['username'], $result[$i]['comm'], $result[$i]['voto'], $result[$i]['data']  );
                $recensione[$i]->setId($result[$i]['id']); //aggiorna l'informazione coerentemente con il db.

            }

            return $recensione;
        }
        else return null;
    }
   /*
    la funzione VerificaRecensione restituisce null se la query non produce risultati o la variabile $result
    viene popolata se nel database c'è già una recensione per la stessa serietv effettuata dallo stesso utente.
   */
    public static function VerificaRecensione($ID){
        $sql="SELECT * FROM ".static::getTables()." WHERE idserie='".$ID."' AND "."username='".$_SESSION['username']."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        return $result;
    }

    /*
     la funzione mediaVoto resituisce la media dei voti assegnata alla serietv calcolata rispetto alle recensioni
     inserite dall'utente
    */
    public static function mediaVoto($ID){
        $sql="SELECT round(SUM(voto)/(SELECT COUNT(*) FROM recensioni WHERE idserie=".$ID."),1) AS media FROM recensioni WHERE idserie=".$ID;
        $db=FDatabase::getInstance();
        $result=$db->load($sql);
        return $result['media'];
    }
    /*
     metodo che permette il salvataggio dei dati delle recensioni sul db.
    */
    public static function store($rece){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FRecensioni",$rece);
        if($id) return $id;
        else return null;
    }
    
}

