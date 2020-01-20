<?php

require_once 'include.php';

/**
 * La classe FDettaglio fornisce query per le serie tv
 * @author N&V
 * @package Foundation
 */

class FDettaglio
{
    private static $tables="serie";
    public $row = array();
    private static $values= "(:id,:titolo,:genere,:stagioni,:autore,:trama,:copertina,:attore1,:personaggio1,:attore2,:personaggio2,:attore3,:personaggio3)";

    public function construct(){

    }
     /**
     * Questo metodo lega gli attributi del Dettaglio con i parametri della INSERT
     *
     * @param EDettaglio 
     */
    public static function bind($stmt,EDettaglio $dettaglio){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':titolo', $dettaglio->getTitolo(), PDO::PARAM_STR);
        //$stmt->bindValue(':mediavoti', $dettaglio->getMediavoti(), PDO::PARAM_FLOAT);
        $stmt->bindValue(':genere', $dettaglio->getGenere(), PDO::PARAM_STR);
        $stmt->bindValue(':stagioni', $dettaglio->getStagioni(), PDO::PARAM_INT);
        $stmt->bindValue(':autore', $dettaglio->getAutore(), PDO::PARAM_STR);
        $stmt->bindValue(':trama', $dettaglio->getTrama(), PDO::PARAM_STR);
        $stmt->bindValue(':copertina', $dettaglio->getCopertina(), PDO::PARAM_BLOB);
        $stmt->bindValue(':attore1', $dettaglio->getAttore1(), PDO::PARAM_STR);
        $stmt->bindValue(':personaggio1', $dettaglio->getPersonaggio1(), PDO::PARAM_STR);
        $stmt->bindValue(':attore2', $dettaglio->getAttore2(), PDO::PARAM_STR);
        $stmt->bindValue(':personaggio2', $dettaglio->getPersonaggio2(), PDO::PARAM_STR);
        $stmt->bindValue(':attore3', $dettaglio->getAttore3(), PDO::PARAM_STR);
        $stmt->bindValue(':personaggio3', $dettaglio->getPersonaggio3(), PDO::PARAM_STR);
    }

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
     * Funzione che estrapola dal db le informazioni della serietv
     * @return string $id della serie
     * @return string $titolo
     * @return string $stagione
     * @return string $autore
     * @return string $attore1
     * @return string $personaggio1
     * @return string $attore2
     * @return string $personaggio2
     * @return string $attore3
     * @return string $personaggio3
     * @return string $trama
     * @return string $copertina
     */

     /*
      La funzione apriDettaglio ci restituisce il risultato della query per poi costruirne un oggetto 
      di tipo EDettaglio.
     */
    public static function apriDettaglio($ID){

        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$ID;
        $db=FDatabase::getInstance();
        $result=$db->load($sql);
        if($result!=null){
            $dettaglio= new EDettaglio($result['titolo'], $result['genere'],$result['stagioni'], $result['autore'], $result['trama'], $result['copertina'], $result['attore1'], $result['personaggio1'], $result['attore2'], $result['personaggio2'], $result['attore3'], $result['personaggio3']);
            $dettaglio->setId($result['id']);
            return $dettaglio;
        }
       else return null;
    }
    
    
}

