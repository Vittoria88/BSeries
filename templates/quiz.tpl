<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="templates/css/theme.css" type="text/css">
  <link rel="stylesheet" href="templates/css/stile.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    type="text/css">
  <link rel="shortcut icon" href="favicon.ico" />
</head>

<body><br><br>
    {include file='navbar.tpl'}
    <div class="container">
        <form id="formquiz" action="quiz.php" method="post">
            <div class="row text-center">
                <div class="col-12"><h2 class="text-primary"><b>QUIZ</b></h2></div>
                {if $quiz.partequiz == 0}
                    <div class="col-12 pb-3">
                        Partecipa al nostro quiz per scoprire quale serie tv è più indicata per te!
                    </div>
                    <div class="col-12">
                        <button type="submit" form="formquiz" value="Submit" class="btn btn-primary">Inizia il quiz</button>
                    </div>
                {/if} 
                {if $quiz.partequiz == 1 || $quiz.partequiz == 2}
                    <div class="col-12">
                        <h4 class="text-primary font-weight-bold">Parte {$quiz.partequiz}</h4>
                        {if $quiz.partequiz == 2}
                            <input type="hidden" id="risposta1" name="risposta1" value="{$quiz.risposta1}">
                            <input type="hidden" id="risposta2" name="risposta2" value="{$quiz.risposta2}">
                        {/if}
                    </div>
                    {foreach from=$domande item=domanda}
                    <div class="col-12 text-primary font-weight-bold pb-3">
                        {$domanda.domanda}<br/>
                        <select class="form-control" id="risposta{$domanda.id}" name="risposta{$domanda.id}">
                            <option value="{$domanda.genere1}">{$domanda.risposta1}</option>
                            <option value="{$domanda.genere2}">{$domanda.risposta2}</option>
                            <option value="{$domanda.genere3}">{$domanda.risposta3}</option>
                            <option value="{$domanda.genere4}">{$domanda.risposta4}</option>
                        </select>
                    </div>
                    {/foreach}
                    <div class="col-12">
                        <button type="submit" form="formquiz" value="Submit" class="btn btn-primary">
                        {if $quiz.partequiz == 1}
                            Vai alla Parte 2
                        {else}
                            Completa il quiz 
                        {/if}
                        </button>
                    </div>
                {/if}
                {if $quiz.partequiz == 3}
                    <div class="col-12 text-center"><h4 class="text-primary font-weight-bold">Risultato Quiz</h4></div>
                    <div class="col-12 text-center pb-3"><h5 class="text-primary">I generi selezionati per te dal quiz sono:</h5></div>
                    <div class="col-12 text-center pb-3"><h5 class="text-primary font-weight-bold">{$generiRisultato[0]} e {$generiRisultato[1]}</h5></div>
                {/if}
            </div>
            <input type="hidden" name="partequiz" value="{$quiz.partequiz+1}">
        </form>
    </div>
</body>
</html>