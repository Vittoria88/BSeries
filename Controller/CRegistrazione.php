<?php

require_once 'include.php';

class CRegistrazione
{

    /**Metodo che in base al metodo di richiesta HTTP provvede:
     * 1) nel caso in cui il metodo di richiesta sia GET:
     *   1a) se l'utente non è loggato a mostrare la pagina di registrazione;
     *   1b) se l'utente è loggato a mostrare la homepage (non può registrarsi!);
     * 2) nel caso in cui il metodo di richiesta sia POST rinvia alla metodo che effettua il controllo del form di registrazione 
     *    nonché di richiamare i metodi per l'inserimento dei dati nel DB;
     * 3) se il metodo di richiesta è diverso da GET e POST restituisce un errore di metodo non permesso.
     */

    static function VerificaRegistrazione()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) 
                header('Location: /SerieTv/index.php');
            else {
                $view = new VRegistrazione();
                $view->showFormRegistration();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            CRegistrazione::Registrazione();
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    /**Metodo che dopo aver verificato il form attraverso il metodo ValFormRegistration() provvede a:
     * 1) nel caso in cui il form sia corretto a inserire nel DB l'utente e tutti i suoi dati (Indirizzo e Foto profilo),
     *    ad inviare l'email di attivazione/verifica dell'account e a mostrare la pagina di benvenuto;
     * 2) nel caso in cui il form non è corretto (Es. per inserimento di dati che non rispettano il formato richiesto, oppure
     *    per esistenza di un altro account con stessa email e/o stesso username) rinvia alla pagina di registrazione specificando 
     *    anche gli eventuali errori.
     */
    static function Registrazione()
    {
        $val = true;
        $view = new VRegistrazione();
        $notval = $view->ValFormRegistrazione();
        foreach ($notval as $errore => $valore) {
            if ($valore == true) {
                $val = false;
                break;
            }
        }
        if (!$val) {
            $view->showFormRegistration($notval, $_POST);
        } else {
            $user = new ERegistrazione($_POST['username'], hash('md5',$_POST['password']), $_POST['nome'], $_POST['cognome'], $_POST['email']);
            $iduser = FRegistrazione::store($user);
            $view->showWelcome();
        }
    }
}
