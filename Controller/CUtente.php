<?php

require_once 'include.php';

class CUtente
{

    /**Metodo che verifica se l'utente è loggato */

    static function isLogged()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['username'])) 
            return true;
        else {
            if ($_SERVER['REQUEST_URI'] != "/SerieTv/login.php") 
                $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
            return false;
        }
    }

    /** Metodo per mostrare il form di login. Se $badlogin è "true" mostra un errore.
     * @param boolean $badlogin è true se il precedente tentativo di login non è andato a buon fine.
     */

    public function showFormLogin($badlogin = null)
    {
        if (isset($badlogin)) $this->smarty->assign('badlogin', $badlogin);
        $this->smarty->display('login.tpl');
    }

    /**
     * Funzione che consente il login di un utente registrato. Si possono avere diversi casi:
     * 1) se il metodo della richiesta HTTP è GET:
     *   - se l'utente è già loggato viene reindirizzato alla homepage;
     *   - se l'utente non è loggato si richiama la funzione Remindme() per verificare se l'utente ha selezionato l'opzione "ricordami"
     *     nel qual caso si visualizza un form di login nel quale gli è possibile accedere direttamente senza reinserire i suoi dati; 
     *     viceversa viene visualizzato il form di login e l'utente deve inserire i propri dati.
     * 2) se il metodo della richiesta HTTP è POST viene richiamata la funzione EnterIn().
     * 3) se il metodo è diverso da quelli sopra -->errore.
     */

    static function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) header('Location: /SerieTv/Logout.php');
            else {
                $view = new VUtente();
                $view->showFormLogin();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            static::Accedi();
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    static function Accedi($user = null)
    {
        if (!isset($user)) {
            $view = new VUtente();
            if ($view->ValFormLogin()) {
                $user = FUtente::ExistUserPass($_POST['username'], hash('md5',$_POST['password']));
                if ($user != null) {
                    if (session_status() == PHP_SESSION_NONE) session_start();
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['username'] = $user->getUserName();
                    $view->showActivation();                    
                    header('Location: /SerieTv/index.php');
                } else {
                    $view->showFormLogin(true);
                }
            } else {
                $view->showFormLogin(true);
            }
        }
    }
/** Metodo che provvede alla rimozione delle variabili di sessione, alla sua distruzione e a rinviare alla homepage  */

static function logout(){
    session_start();
    session_unset();
    session_destroy();
    header('Location: /SerieTv/index.php');
}
/*

*/    
}
