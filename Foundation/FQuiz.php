<?php

require_once 'include.php';

/**
 * La classe FQuiz fornisce query per il quiz
 * @author V&N
 * @package Foundation
 */

class FQuiz
{
    private static $tables="quiz";
    
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
    /*
    
    */
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
    /* Funzione che estrapola dal db le domande*/
    public static function ListaDomande(){
        $sql="SELECT * FROM ".static::getTables(). " ORDER BY parte ASC, id ASC;";
        //echo $sql; die();
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        
        return $result;
    }
}

