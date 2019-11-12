<?php

require_once 'include.php';

/**
 * Classe che si occupa dell'input-output dei contenuti riguardanti gli utenti. In particolare della "validazione" dei dati inseriti 
 * nelle form richiamando metodi di livello entity e del passaggio degli appositi parametri a Smarty per la costruzione dei template.
 * @package ViewValFormRegistration
 * 
 */


class VRegistrazione
{

    private $smarty;
    private $notval;


    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->notval = array(
            'username' => false,
            'password' => false,
            'nome' => false,
            'cognome' => false,
            'email' => false,
        );
    }

    /** Metodo per mostrare il form di registrazione. L'array $errors è utilizzato per mostrare gli errori effettuati nella compilazione del form,
     * l'array $values per reinserire i valori corretti della precedente compilazione non avvenuta con successo.
     * @param array $errors array dei campi errati della form;
     * @param array $values array dei valori corretti da reinserire nella form.
     */
    public function showFormRegistration($errors = null, $values = null)
    {
        if (isset($errors)) {
            $this->smarty->assign('errors', $errors);
            $this->smarty->assign('values', $values);
        }
        $this->smarty->display('registration.tpl');
    }

    /** Funzione che verifica la correttezza dei dati inseriti nel form di registrazione.
     * Prima si verifica se la relativa componente  dell'array $_POST è settata
     * ed in tal caso si richiama il metodo statico dell'entità corrispondente per 
     * verificarne la correttezza. Per i campi che devono essere univoci si verifica anche l'univocità. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     * 
     * @return $notval array dei campi della form. Un elemento è true se è il relativo campo della form è valido o viceversa.
     */
    public function ValFormRegistrazione()
    {

        if (isset($_POST['nome'])) {
            $this->notval['nome'] = !ERegistrazione::valNome($_POST['nome']);
        } else   $this->notval['nome'] = true;

        if (isset($_POST['cognome'])) {
            $this->notval['cognome'] = !ERegistrazione::valCognome($_POST['cognome']);
        } else   $this->notval['cognome'] = true;

        if(isset($_POST['username'])){
            if(!ERegistrazione::valUsername($_POST['username']) || FRegistrazione::ExistUsername($_POST['username'])){
                $this->notval['username']=true;
            }
        } else   $this->notval['username'] = true;

        if (isset($_POST['email'])) {
            $this->notval['email'] = !ERegistrazione::valEmail($_POST['email']);
        } else   $this->notval['email'] = true;

        if (isset($_POST['password'])) {
            $this->notval['password'] = !ERegistrazione::valPassword($_POST['password']);
        } else   $this->notval['password'] = true;

        return $this->notval;
    }

    /** Funzione che restituisce il vettore degli errori 
     * 
     * @return $notval array dei campi della form
     */

    public function getNotVal()
    {
        return $this->notval;
    }

    /** Metodo per mostrare la pagina di benvenuto quando la registrazion va a buon fine. */

    public function showWelcome()
    {
        $this->smarty->display('welcome.tpl');
    }
}
