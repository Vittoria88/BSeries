<?php

require_once 'include.php';


/**
 * La classe CInfo implementa la funzionalità riguardanti le informazioni
 * @author Gruppo 3
 * @package Controller
 */


class CChiSiamo
{
    static function ChiSiamo()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $view = new VChiSiamo();
            $view->showChiSiamo();
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }
}
