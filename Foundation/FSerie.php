<?php

require_once 'include.php';

/**
 * La classe FSerie fornisce query per le serie tv
 * @author V&N
 * @package Foundation
 */

class FSerie
{
    private static $tables = "serie";
    private static $values= "(:id, :titolo,:genere ,:autore, :copertina,)";


    public static function getTables()
    {
        return static::$tables;
    }


    public function construct(){

    }

    public static function bind($stmt,ESerie $sSerie){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':titolo', $sSerie->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':genere', $sSerie->getGenere(), PDO::PARAM_STR);
        $stmt->bindValue(':autore', $sSerie->getAutore(), PDO::PARAM_STR);
        $stmt->bindValue(':copertina', $sSerie->getCopertina(), PDO::PARAM_BLOB);

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
     * @return string $id della serie
     * @return string $titolo
     * @return string $autore
     * @return object $copertina
     */

     /*
     funzione che restituisce un array di oggetti ESerie in base ai parametri che gli vengono passati,
     tali parametri si popolano dopo aver effettuato il quiz o dopo aver inserito una stringa nel form di ricerca
     */
    public static function ListaSerie($str,$gen1,$gen2)
    {
        if ($str != "") 
        {
            $str = " WHERE TITOLO LIKE '%" . $str . "%'";
        }
        else if($gen1 != "")
        {
            $gen1 = " WHERE GENERE='".$gen1."' OR  GENERE='".$gen2."'";
        }
        $sql = "SELECT * FROM ".static::getTables().$str.$gen1." ORDER BY genere ASC, titolo ASC";
        $db = FDatabase::getInstance();
        $result = $db->loadMultiple($sql);
        if($result!=null){
            for($i=0; $i<count($result); $i++){
                $sserie[]=new ESerie($result[$i]['titolo'], $result[$i]['genere'], $result[$i]['autore'],$result[$i]['copertina']);
                $sserie[$i]->setId($result[$i]['id']); //aggiorna l'informazione coerentemente con il db 
            }

            return $sserie;
        }
        else return null;
    }
    /* 
     La funzione ListaGenere restituisce un array contentente tutti i generi delle serie in ordine alfabetico
    */
    public static function ListaGenere($str,$gen1,$gen2)
    {
        if ($str != "") {
            $str = " WHERE TITOLO LIKE '%" . $str . "%'";
        }
        else if($gen1 != "")
        {
            $gen1 = " WHERE GENERE='".$gen1."' OR  GENERE='".$gen2."'";
        }
        $sql = "SELECT DISTINCT(GENERE) FROM ".static::getTables().$str.$gen1." ORDER BY genere ASC, titolo ASC";
        $db = FDatabase::getInstance();
        $result = $db->exist($sql);
        return $result;
    } 
}
