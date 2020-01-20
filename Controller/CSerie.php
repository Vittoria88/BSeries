<?php

require_once 'include.php';


/**
 * La classe CSerie implementa le funzioni di controllo per la pagina di visualizzazione 
 * dell'elenco delle serietv. Se la richiesta HTTP è POST l'utente proviene dal quiz o dal form di ricerca.
 * @author V&N
 * @package Controller
 */


class CSerie
{
    static function Serie()
    {
        $gen1="";
        $gen2="";
        $str = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            if(isset($_POST['str']))
                $str = $_POST['str'];
            else
                { 
                    $gen1 = $_POST['genere1'];
                    $gen2 = $_POST['genere2'];
                }
        }
        $lista_genere = FSerie::ListaGenere($str,$gen1,$gen2);

        $lista_serie = FSerie::ListaSerie($str,$gen1,$gen2);

        $view = new VSerie();
        $view->showSerie($lista_serie, $lista_genere);
    }
}
