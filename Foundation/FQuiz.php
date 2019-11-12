<?php

require_once 'include.php';

/**
 * La classe FSerie fornisce query per le serie tv
 * @author Gruppo 3
 * @package Foundation
 */

class FListaQuiz
{
    private static $tables="quiz";
    public $row = array();

     /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

    public static function getTablesLikes(){
        return static::$tablesLikes;
    }

   
     /**
     * 
     * questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }
    
    /** 
     * Funzione che estrapola dal db le domande
     * @return object $id della domanda
     * @return object $parte (1 o 2)
     * @return object $domanda
     * @return object $risposta1
     * @return object $genere1
     * @return object $risposta2
     * @return object $genere2
     * @return object $risposta3
     * @return object $genere3
     * @return object $risposta4
     * @return object $genere4
     * @return object $risposta5
     * @return object $genere5
     */

    public static function ListaDomande(){
        $sql="SELECT * FROM ".static::getTables(). " ORDER BY parte ASC, id ASC;";
        //echo $sql; die();
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);

        return $result;
    }

    public static function ListaGeneri($sqlAdd){
        //$sql="SELECT COUNT(*) as likes FROM ".static::getTablesLikes(). $sqlAdd;
        $sql="SELECT DISTINCT A.GENERE, (SELECT COUNT(B.ID) FROM likes B WHERE A.GENERE = B.GENERE) AS LIKES FROM serie A" .$sqlAdd. " ORDER BY LIKES DESC, A.GENERE ASC";
        //echo $sql; die();
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);

        return $result;
    }
}

