<?php

 /**
 * La funzione require_once non consente di includere più volte lo stesso file; in particolare, 
 * in caso di doppia inclusione, non consente di includere più volte lo stesso file.
 * Mentre, in caso di file non trovato, genera un parse error che interrompe l'esecuzione dello script.
 */

   
   /**
    * Inclusione del file che permette  la configurazione di Smarty
    */
    require_once 'Smarty/libs/Smarty.class.php';
  
   /**
    * Inclusione dei file contenuti nella cartella Controller
    */
    require_once 'Controller/CUtente.php'; 
    require_once 'Controller/CChiSiamo.php'; 
    require_once 'Controller/CSerie.php'; 
    require_once 'Controller/CQuiz.php'; 
    require_once 'Controller/CRegistrazione.php'; 

   /**
    * Inclusione dei file contenuti nella cartella Entity
    */
    require_once 'Entity/ERegistrazione.php'; 
    require_once 'Entity/EUtente.php'; 
    require_once 'Entity/ESerie.php'; 
//    require_once 'Entity/EQuiz.php'; 

   /**
    * Inclusione dei file contenuti nella cartella Foundation
    */
   require_once 'Foundation/FRegistrazione.php'; 
   require_once 'Foundation/FDatabase.php';
   require_once 'Foundation/FUtente.php';
   require_once 'Foundation/FSerie.php';
   require_once 'Foundation/FQuiz.php';
   /**
    * Inclusione dei file contenuti nella cartella View
    */
   require_once 'View/VChiSiamo.php';
   require_once 'View/VSerie.php';
   require_once 'View/VQuiz.php';
   require_once 'View/VRegistrazione.php'; 
   require_once 'View/VUtente.php'; 
?>