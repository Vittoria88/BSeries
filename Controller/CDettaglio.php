<?php

require_once 'include.php';


/**
 * La classe CDettaglio implementa la funzionalità riguardanti le informazioni delle serietv 
 * in maniera più dettagliata.
 * @author N&V
 * @package Controller
 */


class CDettaglio
{
    static function Dettaglio()
    {
        $view = new VDettaglio(); //creazione dell'istanza della classe VDettaglio

        /*
        variabile di controllo che non permette all'utente di
        recensire una serie che ha già commentato in precedenza.
        */
        $controlla=null; 

        /*
         recupero dell'id della serie che si vuole visualizzare tramite il metodo GET
        */                
        $ID = 0;
        if (isset($_GET["id"])) {
            $ID = $_GET["id"];
        }
        /*
            $valori è il risultato della funzione apriDettaglio 
            (metodo della classe FDettaglio) e restituisce l'oggetto EDettaglio
        */
        $valori = FDettaglio::apriDettaglio($ID); 
        /*
           funzione per verificare se l'utente ha già in precedenza recensito la serietv e se è loggato, 
           questa verifica la svolge in particolare la funzione Commento che fa partire successivamente 
           la funzione VerificaRecensione (metodo della classe FRecensione) di cui $controlla è il 
           risultato(che può essere o null o popolato).
        */
        if ($_SERVER['REQUEST_METHOD'] == "POST" && CUtente::isLogged()) {

                $controlla=CDettaglio::Commento();

        }
        $recensioni = new FRecensioni(); //nuova istanza della classe FRecensioni
        $valoriR = $recensioni->apriRecensione($ID); //$valoriR è un array di oggetti ERecensione 
        $voto = "5";
        if (count($valoriR) >= 1) {
            $voto = $recensioni->mediaVoto($ID); //funzione che restituisce in $voto la media dei voti per ogni serietv
        }
        /*
         metodo della classe VDettaglio a cui passiamo i parametri sopra descritti
        */

        $view->showDettaglio($controlla, $valori,$valoriR,$voto); 

    }
      /*
       La funzione Commento verifica se la richiesta proviene dal metodo POST e succesivamente crea un'istanza
       della classe ERecensione per la recensione inserita verificando che non esista un'altra recensione 
       inserita dallo stesso utente
     */

    static function Commento(){
        $idserie=0;
        if(isset($_POST["id"])){
            $idserie=$_POST["id"];
        }
        if ($idserie != 0)
        {
          $rece=new ERecensione($idserie,$_SESSION['username'],$_POST['comm'],$_POST['voto'],date('Y-m-d H:i:s'));
          $controlla=CDettaglio::VerificaRecensione($idserie,$rece);
          return $controlla;
        }
    }
    /* 
     funzione di verifica del singolo commento per stessa serie e stesso username
    */
    function VerificaRecensione($idserie, $rece)
    {
        $controlla = FRecensioni::VerificaRecensione($idserie);
        if ($controlla == null) {
            $idrece = FRecensioni::store($rece);
        }
        return $controlla;
    }
}
