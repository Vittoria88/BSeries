<?php

require_once 'include.php';

/**
 * La classe FSerie fornisce query per le serie tv
 * @author Vittoria
 * @package Foundation
 */

class FSerie
{
    private static $tables="serie";
    private static $tablesLikes="likes";
    private static $values="(:id,:idserie,:idutente,:genere)";
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

    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi idserie e idutente da inserire nella tabella likes
     * @param PDOStatement $stmt 
     * @param $IDserie $IDutente i dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, ESerie $like){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':idserie', $like->getIdSerie(), PDO::PARAM_INT); 
        $stmt->bindValue(':idutente', $like->getIdUtente(), PDO::PARAM_INT);
        $stmt->bindValue(':genere', $like->getGenere(), PDO::PARAM_STR);
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
     * Funzione che estrapola dal db le serie tv disponibili
     * @return object $id della serie
     * @return object $titolo
     * @return object $stagione
     * @return object $autore
     * @return object $attore1
     * @return object $personaggio1
     * @return object $attore2
     * @return object $personaggio2
     * @return object $attore3
     * @return object $personaggio3
     * @return object $trama
     * @return object $copertina
     */

    public static function ListaSerie($IDserie){
        $sqlAdd = "";

        if($IDserie>0)
        {
            $sqlAdd = " WHERE ID=" . $IDserie;
        }

        $sql="SELECT * FROM ".static::getTables().$sqlAdd. " ORDER BY genere ASC, titolo ASC;";
        //echo $sql; die();
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);

        if(!empty($result) && $IDserie>0)
        {
            $resultSingle[0] = $result;
            $result = $resultSingle;
        }
        
        return $result;
    }

    public static function LikesSerie($IDserie){
        $sql="SELECT COUNT(*) as likes FROM ".static::getTablesLikes(). " WHERE idserie=" . $IDserie;
        //echo $sql; die();
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);

        if(!empty($result))
        {
            $result = $result["likes"];
        } else 
        {
            $result = 0;
        }

        return $result;
    }

    public static function store($like){
        $sql="INSERT INTO ".static::getTablesLikes()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FSerie",$like);
        if($id) return $id;
        else return null;
    }   
}

