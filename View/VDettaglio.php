
<?php

require_once 'include.php';

/**
 * La classe VDettaglio si occupa di visualizzare informazioni riguardanti i creatori dell'applicazione e perchè sceglierla.
 * @author Gruppo NV
 * @package View
 */

class VDettaglio
{
    private $smarty;

    /** Metodo che consente la visualizzazione della pagina relativa alle info.
     * Fa uso di smarty e viene richiamata all'interno di CSerie.
     */
    function showDettaglio($controlla, $valori, $valoriR, $voto)
    {
        $smarty = new Smarty();
        if (CUtente::isLogged()) {
            $smarty->assign('userlogged', $_SESSION['username']);
        } else {
            $smarty->assign('userlogged', 'nouser');
        }
        $smarty->assign('valori', $valori);
        $smarty->assign('valoriR', $valoriR);
        $smarty->assign('votomedia', $voto['media']);
        $smarty->assign('noninserire', $controlla);
        $smarty->display('dettaglio.tpl');
    }

}
