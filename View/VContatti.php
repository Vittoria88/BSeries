
<?php

require_once 'include.php';

/**
 * La classe VContatti si occupa di visualizzare informazioni riguardanti i creatori dell'applicazione.
 * @author Gruppo vit&no
 * @package View
 */

class VContatti
{
    private $smarty;

    /** Metodo che consente la visualizzazione della pagina relativa alle info.
     * Fa uso di smarty e viene richiamata all'interno di CContatti.
     */
    function showContatti()
    {
        $smarty = new Smarty();
        if (CUtente::isLogged()) $smarty->assign('userlogged', $_SESSION['username']);
        $smarty->display('contatti.tpl');
    }
}
