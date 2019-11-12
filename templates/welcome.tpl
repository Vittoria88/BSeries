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

<body>
{include file='navbar.tpl'}
  <div class="py-5 text-center w-100 h-100">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 mb-4 text-dark">Benvenuto!</h1>
          <p class="lead mb-5 text-dark">Ti è stata inviata una mail di conferma sull'indirizzo e-mail da te indicato!
            <br>Clicca sul link all'interno del messaggio e inserisci il codice di attivazione nell'apposita sezione!
            <br>
          </p>
          <a href="/SerieTv/login.php" class="btn btn-lg btn-primary mx-1">Vai al login</a>
        </div>
      </div>
    </div>
  </div>
</body>
<noscript>
<meta http-equiv=refresh content='0; url=/SerieTv/login.php'>
</noscript>
</html>