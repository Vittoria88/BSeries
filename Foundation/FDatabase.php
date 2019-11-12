<?php
require_once 'include.php';

if (file_exists('config.inc.php')) require_once 'config.inc.php';
/*  Singleton: rappresenta un tipo particolare di classe che garantisce
 *  che soltanto un'unica istanza della classe stessa possa essere creata 
 *  all'interno di un programma
 */

/**
 * Lo scopo di questa classe e' quello di fornire un accesso unico al DBMS, cosi che l'accesso
 * ai dati persistenti da parte degli strati superiore dell'applicazione sia piu' intuitivo.
 * @author gruppo 3
 * @package Foundation
 */
class FDatabase
{
    /** l'unica istanza della classe */
    private static $instance = null;
    /** oggetto PDO che effettua la connessione al dbms */
    private $db;
    /** percorso */
    private static $UpPath = "Upload/";
    /** costruttore privato, l'unico accesso è dato dal metodo getInstance() */
    private function __construct()
    {
        global $host, $database, $username, $password;
        try {
            $this->db = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            die;
        }
    }
    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return FPersistantManager l'istanza dell'oggetto.
     */
    public static function getInstance()
    { //restituisce l'unica istanza (creandola se non esiste gi�)
        if (static::$instance == null) {
            static::$instance = new FDatabase();
        }
        return static::$instance;
    }
    /**
     * Metodo che permette di salvare informazioni contenute in un oggetto
     * Entity sul database.
     */
    public function store($sql, $class, $eobj)
    {
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($sql);       
            $class::bind($stmt, $eobj);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            $this->db->commit();
            $this->closeDbConnection();
            return $id;
        } catch (PDOException $e) {
            echo "Attenzione errore: " . $e->getMessage();
            $this->db->rollBack();
            die;
            return null;
        }
    }

    public function closeDbConnection()
    {
        static::$instance = null;
    }

    public function exist($sql){
        try{
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)==1) return $rows[0];
            else if(count($rows)>1) return $rows;
            $this->closeDbConnection();
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }
}
