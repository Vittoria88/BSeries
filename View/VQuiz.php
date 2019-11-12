
<?php

require_once 'include.php';

/**
 * La classe Vchisiamo si occupa di visualizzare informazioni riguardanti i creatori dell'applicazione e perchè sceglierla.
 * @author Gruppo NV
 * @package View
 */

class VQuiz
{
    private $smarty;

    /** Metodo che consente la visualizzazione della pagina relativa alle info.
     * Fa uso di smarty e viene richiamata all'interno di CQuiz.
     */
    function showQuiz()
    {
        $Lquiz=new FListaQuiz();//FQuiz::ListaDomande();
        $IDquiz=0;

        if (array_key_exists("id", $_GET)) 
        {
            $IDserie = $_GET["id"]+0;
        }

        $lista_domande=$Lquiz->ListaDomande();

        $quiz["risposta1"] = "";
        $quiz["risposta2"] = "";
        $quiz["risposta3"] = "";
        $quiz["risposta4"] = "";
        $Dnum = 0;

        //print_r($lista_domande);

        if(!isset($_POST["partequiz"]))
        {
            $_POST["partequiz"] = 0;
        }

        if($_POST["partequiz"] == 1)
        {
            //Inizio del quiz
            $quiz["partequiz"] = 1;

            for($i=0; $i<count($lista_domande); $i++)
            {
                if($lista_domande[$i]["parte"]==1)
                {
                    $domande[$Dnum] = $lista_domande[$i];
                    $Dnum++;
                }
            }
         } else if($_POST["partequiz"] == 2)
        {
            //Dati inviati dalla prima parte del quiz e risposte
            $quiz["partequiz"] = 2;
            $quiz["risposta1"]=$_POST["risposta1"];
            $quiz["risposta2"]=$_POST["risposta2"];

            for($i=0; $i<count($lista_domande); $i++)
            {
                if($lista_domande[$i]["parte"]==2)
                {
                    $domande[$Dnum] = $lista_domande[$i];
                    $Dnum++;
                }
            }
        } else if($_POST["partequiz"] == 3)
        {
            //Dati inviati della seconda parte del quiz e risposte
            $quiz["partequiz"] = 3;
            $quiz["risposta1"]=$_POST["risposta1"];
            $quiz["risposta2"]=$_POST["risposta2"];
            $quiz["risposta3"]=$_POST["risposta3"];
            $quiz["risposta4"]=$_POST["risposta4"];

            //Controllo risposte
            $i=0;

            if($quiz["risposta1"] == $quiz["risposta2"])
            {
                $generi[$i]=$quiz["risposta1"];
                $i++;
            } else {
                $generi[$i]=$quiz["risposta1"];
                $i++;
                $generi[$i]=$quiz["risposta2"];
                $i++;
            }

            if($quiz["risposta3"] == $quiz["risposta4"])
            {
                $generi[$i]=$quiz["risposta3"];
                $i++;
            } else {
                $generi[$i]=$quiz["risposta3"];
                $i++;
                $generi[$i]=$quiz["risposta4"];
                $i++;
            }
            
            //Generazione query sql con i generi selezionati
            $sqlAdd=" WHERE ";

            for($i=0; $i<count($generi); $i++)
            {
                if($i>0)
                {
                    $sqlAdd .= " OR ";
                }

                $sqlAdd .= "A.GENERE = '" .$generi[$i]. "'";
            }

            $Lquiz=new FListaQuiz();//FQuiz::ListaGeneri();
            $generi = $Lquiz->ListaGeneri($sqlAdd);

            if(count($generi)==2)
            {
                $generiRisultato[0] = $generi[0]["GENERE"];
                $generiRisultato[1] = $generi[1]["GENERE"];
            } else 
            {
                $generiRisultato[0] = $generi[0]["GENERE"];
                $generiRisultato[1] = $generi[count($generi)-1]["GENERE"];
            }
        } else 
        {
            //Inizio quiz
            $quiz["partequiz"] = 0;
       }

        $smarty = new Smarty();
        if (CUtente::isLogged()) $smarty->assign('userlogged', $_SESSION['username']);
 
        if($quiz["partequiz"] == 1 || $quiz["partequiz"] == 2)
        {
            $smarty->assign('domande', $domande);
        } else if($quiz["partequiz"] == 3)
        {
            $smarty->assign('generiRisultato', $generiRisultato);
        }

        $smarty->assign('quiz', $quiz);
        $smarty->display('quiz.tpl');
    }
}
