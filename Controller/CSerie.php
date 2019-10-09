<?php

require_once 'include.php';


/**
 * La classe CInfo implementa la funzionalità riguardanti le informazioni
 * @author Gruppo 3
 * @package Controller
 */


class CSerie
{
    static function Serie()
    {
        $idNewLike = 0;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Controllo per inserimento Like
            if($_POST["idserie"] > 0 & $_POST["idutente"] > 0 & isset($_POST["genere"])) {
                $like = new ESerie($_POST["idserie"],$_POST["idutente"],$_POST["genere"]);
                $idNewLike = FSerie::store($like);

            }
        }

        //if ($_SERVER['REQUEST_METHOD'] == "GET") 
        {
            $view = new VSerie();
            $view->showSerie($idNewLike);
        }
    }
}
