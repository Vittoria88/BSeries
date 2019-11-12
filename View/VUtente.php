<?php

require_once 'include.php';


class VUtente
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    /** Metodo per mostrare il form di login. Se $badlogin è "true" mostra un errore.
     * @param boolean $badlogin è true se il precedente tentativo di login non è andato a buon fine.
     */

    public function showFormLogin($badlogin = null)
    {
        if (isset($badlogin)) $this->smarty->assign('badlogin', $badlogin);
        $this->smarty->display('login.tpl');
    }

    /**Funzione che verifica la correttezza dei dati inseriti nel form di login.
     * Prima si verifica se la relativa componenete dell'array $_POST settata
     * ed in tal caso si richiamam il metodo statico dell'entità corrispondente 
     * per verificarne la correttezza. Restituisce un booleano.
     */

    public function valFormLogin(): bool
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (!EUtente::valUsername($_POST['username']) || !EUtente::valPassword($_POST['password'])) {
                return false;
            }
        }
        return true;
    }

    /** Metodo per mostrare la pagina di attivazione dell'account.*/
    function showActivation()
    {
        $this->navbar();
    }

    public function navbar()
    {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', $_SESSION['username']);
    }
}
