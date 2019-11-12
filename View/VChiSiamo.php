
<?php

require_once 'include.php';

/**
 * La classe Vchisiamo si occupa di visualizzare informazioni riguardanti i creatori dell'applicazione e perchè sceglierla.
 * @author Gruppo NV
 * @package View
 */

class VChiSiamo
{
    private $smarty;

    /** Metodo che consente la visualizzazione della pagina relativa alle info.
     * Fa uso di smarty e viene richiamata all'interno di CChisiamo.
     */
    function showChiSiamo()
    {
        $smarty = new Smarty();
        if (CUtente::isLogged()) $smarty->assign('userlogged', $_SESSION['username']);
        $smarty->display('chisiamo.tpl');
    }
}
