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
  <div class="py-2 w-100 h-100">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-8">
          <h1 class="text-left display-3 text-dark">
            <b>B-SERIES!</b>
          </h1>
          <p class="lead text-dark">
            <b>Scelto la Serie TV?</b>
          </p>
        </div>
        <div class="col-4" style="display:block" id="loginstand">
          <form action="/SerieTv/registrazione.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body p-3">
                    <h3 class="pb-3">Modulo registrazione</h3>
                    <div class="form-group">
                      <label>Username</label>
                      {if isset($errors)}
                      <input class="form-control border border-danger" placeholder="scegli una Username" name="username" id="username"></div>
                      {else}
                      <input class="form-control" placeholder="scegli una Username" name="username" id="username"></div>
                    {/if}
                    <div class="form-group">
                      <label>Nome</label>
                      {if isset($errors)}
                      <input class="form-control border border-danger" placeholder="metti il tuo Nome" name="nome" id="nome"></div>
                      {else}
                      <input class="form-control" placeholder="metti il tuo Nome" name="nome" id="nome"></div>
                    {/if}
                    <div class="form-group">
                      <label>Cognome</label>
                      {if isset($errors)}
                      <input class="form-control border border-danger" placeholder="metti il tuo Cognome" name="cognome" id="cognome"></div>
                      {else}
                      <input class="form-control" placeholder="metti il tuo Cognome" name="cognome" id="cognome"></div>
                    {/if}
                    <div class="form-group">
                      <label>Password</label>
                      {if isset($errors)}
                      <input type="password" class="form-control border border-danger" placeholder="scegli una password" name="password" id="password"></div>
                      {else}
                      <input type="password" class="form-control" placeholder="scegli una password" name="password" id="password"></div>
                    {/if}
                    <div class="form-group">
                      <label>Email</label>
                      {if isset($errors)}
                      <input type="email" class="form-control border border-danger" placeholder="metti la tua Email" name="email" id="email"></div>
                      {else}
                      <input type="email" class="form-control" placeholder="metti la tua Email" name="email" id="email"></div>
                    {/if}
                    <button class="btn btn-primary btn-lg submit-button" type="submit">Invia Dati</button>
                    <div class="text-danger text-center">{if isset($errors)}Attenzione! Username già inserito!{/if}</div> 
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>