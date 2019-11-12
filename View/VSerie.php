
<?php

require_once 'include.php';

/**
 * La classe Vchisiamo si occupa di visualizzare informazioni riguardanti i creatori dell'applicazione e perchè sceglierla.
 * @author Gruppo NV
 * @package View
 */

class VSerie
{
    private $smarty;

    /** Metodo che consente la visualizzazione della pagina relativa alle info.
     * Fa uso di smarty e viene richiamata all'interno di CSerie.
     */
    function showSerie($idNewLike)
    {
        $Lserie=new FSerie();//FSerie::ListaSerie();
        $IDserie=0;

        if (array_key_exists("id", $_GET)) 
        {
            $IDserie = $_GET["id"]+0;
        }

        $lista_serie=$Lserie->ListaSerie($IDserie);

        //Convert image in base64
        if(!empty($lista_serie))
        {
            for($i=0; $i<count($lista_serie); $i++)
            {
                $lista_serie[$i]["copertina"]=base64_encode($lista_serie[$i]["copertina"]);
            }
        }

        if (CUtente::isLogged()) 
        {
            $idutente = FUtente::GetIdUser();
        } else 
        {
            $idutente = 0;
        }

        if($IDserie > 0)
        {
            $LikesSerie = $Lserie->LikesSerie($IDserie);
            $lista_serie[0]["likes"] = $LikesSerie;
            $lista_serie[0]["idnewlike"] = $idNewLike;
            $lista_serie[0]["idutente"] = $idutente;
        } else 
        {
            $LikesSerie = 0;
        }

        $smarty = new Smarty();
        if (CUtente::isLogged()) $smarty->assign('userlogged', $_SESSION['username']);
        $smarty->assign('series', $lista_serie);
        $smarty->display('serie.tpl');
    }
}
