<?php

require_once 'include.php';


/**
 * La classe CInfo implementa la funzionalità riguardanti le informazioni
 * @author Gruppo 3
 * @package Controller
 */


class CQuiz
{
    static function Quiz()
    {
        $view = new VQuiz();
        $view->showQuiz();
    }
}
