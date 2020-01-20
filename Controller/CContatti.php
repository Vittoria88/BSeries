<?php

require_once 'include.php';


/**
 * La classe CContatti implementa la funzionalità riguardanti i contatti degli autori del progetto web.
 * @author V&N
 * @package Controller
 */

/*
La funzione ChiSiamo() verifica se la richiesta per visualizzare la pagina è in GET o in POST
*/

class CContatti
{
    static function Contatti()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $view = new VContatti();
            $view->showContatti();
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }
}