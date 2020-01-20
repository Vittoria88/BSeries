<?php

require_once 'include.php';


/**
 * La classe CQuiz implementa la funzionalità riguardanti il quiz utile 
 * per la scelta della serietv da visualizzare.
 * @author N&V
 * @package Controller
 */

/*
 la funzione Quiz crea un'istanza della classe VQuiz per poi eseguire il metodo showQuiz.
*/
class CQuiz
{
    static function Quiz()
    {
        $view = new VQuiz();
        $view->showQuiz();
    }
}
