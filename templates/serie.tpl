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
  {assign var=gen value=""}
  <div class="container-fluid">
    <div class="row">
    {if !empty($series)}
      {foreach from=$series item=serie}
        {if $gen != $serie.genere}
      <div class="col-12 text-center"><h2 class="text-primary"><b>{$serie.genere}</b></h2></div>
          {assign var=gen value=$serie.genere}
        {/if}
        {if count($series) == 1}
      <div class="col-12">
        {else}
      <div class="col-12 col-xl-6">
      {/if}
        <div class="col-12 text-center"><img class="rounded copertina" src="data:image/jpeg;base64,{$serie.copertina}" /></div>
        {if count($series) > 1}
          <div class="row mt-3 pl-4 pr-4">
            <div class="col-12 text-center text-primary"><h5><b>{$serie.titolo}</b></h5></div>
            <div class="col-12 text-center text-primary"><h5><b><a href="./serie.php?id={$serie.id}">Visualizza la serie</a></b></h5></div>
          </div>
        {else}
          <div class="row mt-3 pl-4 pr-4">
            <div class="col-12 col-xl-4 text-primary"><h5><b>Titolo: </b>{$serie.titolo}</h5></div>
            <div class="col-12 col-xl-4 text-primary"><h5><b>Stagioni: </b>{$serie.stagioni}</h5></div>
            <div class="col-12 col-xl-4 text-primary"><h5><b>Autore: </b>{$serie.autore}</h5></div>
          </div>
          <div class="row pl-4 pr-4">
            <div class="col-12 text-primary"><h5><b>Interpreti: </b>{$serie.attore1} ({$serie.personaggio1}), {$serie.attore2} ({$serie.personaggio2}), {$serie.attore3} ({$serie.personaggio3})</h5></div>
          </div>
          <div class="row pl-4 pr-4 mb-3">
            <div class="col-12 text-primary"><h5><b>Trama: </b>{$serie.trama}</h5></div>
          </div>
          <div class="row pl-4 pr-4 mb-3">
            {if $serie.idutente > 0}
              <div class="col-12 text-primary text-center"><a href="#" onclick="document.forms.setlike.submit()"><img src="templates/images/like.png"></a></div>
              <form id="setlike" action="./serie.php?id={$serie.id}" method="post">
                <input type="hidden" name="idserie" value="{$serie.id}">
                <input type="hidden" name="idutente" value="{$serie.idutente}">
                <input type="hidden" name="genere" value="{$serie.genere}">
              </form>
            {/if}
            <div class="col-12 text-primary text-center"><h5><b>Like totali: </b>{$serie.likes}</h5></div>
          </div>
        {/if}
        </div>
    {/foreach}
  {else}
    <div class="col-12 text-center"><h2 class="text-primary"><b>Nessuna serie trovata</b></h2></div>
  {/if}
  {if count($series) <= 1}
    <div class="col-12 text-center text-primary"><h5><b><a href="./serie.php">Torna alla lista serie</a></div>
  {/if}
  </div>
</div>

{if count($series) == 1}
  {if $serie.idnewlike > 0}
    <script type="text/javascript">
      setTimeout(function(){ alert("Grazie per aver votato la serie"); }, 500);
    </script>
  {/if}
{/if}
</body>
</html>