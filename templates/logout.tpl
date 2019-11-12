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
  <div class="py-5 w-100 h-100">
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <form action="/SerieTv/login.php" method="POST" enctype="multipart/form-data">
                    <h3 class="pb-3">Logout Utente</h3>
                    <button class="btn btn-primary btn-lg submit-button" type="submit">LOGOUT</button>
                  </form>
                  <br />
                  <br />
                  <br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>