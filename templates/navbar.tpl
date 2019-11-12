{assign var='userlogged' value=$userlogged|default:'nouser'}
<div style="height: 85px">
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand pr-5" href="index.php">
      <img src="templates/images/logo.png" />
    </a>
    <ul class="navbar-nav pl-1">
      <a href="/SerieTv/chisiamo.php" class="btn btn-info" role="button"><b>&nbsp;&nbsp; CHI SIAMO &nbsp;&nbsp;</b></a>
    </ul>
    <ul class="navbar-nav pl-1">
      <a href="/SerieTv/quiz.php" class="btn btn-info" role="button"><b>&nbsp;&nbsp; QUIZ &nbsp;&nbsp;</b></a>
    </ul>
    <ul class="navbar-nav pl-1">
      <a href="/SerieTv/serie.php" class="btn btn-info" role="button"><b>&nbsp;&nbsp; SERIE TV &nbsp;&nbsp;</b></a>
    </ul>
    <ul class="navbar-nav pl-1">
      <a href="/SerieTv/contatti.php" class="btn btn-info" role="button"><b>&nbsp;&nbsp; CONTATTI &nbsp;&nbsp;</b></a>
    </ul>    
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <form class="form-inline my-2 my-lg-0" style="margin-left:81px" action="/SerieTv" method="get">
        <div class="input-group">
          <input class="form-control  form-control-sm  " style="border-radius:20px 0 0 20px" type="search"
            placeholder="Cerca..." style="margin-left:-15px" size="14" name="str">
          <button type="submit" class="btn navbar-btn text-primary btn-light"
            style="border-radius:0 20px 20px 0;height: 35px;line-height: 1;">
            <span class="fa fa-search"></span>
          </button>
        </div>
        {if $userlogged!='nouser'}
          <span class="navbar-text text-light">&nbsp; Benvenuto, {$userlogged}</span>
          <a class="btn navbar-btn ml-2 text-primary btn-light" href="/SerieTv/logout.php">&nbsp; Logout &nbsp;</a>        
        {else}
          <ul class="navbar-nav"> 
            <a href="/SerieTv/login.php" class="btn navbar-btn ml-2 text-primary btn-light">
              <b>&nbsp;&nbsp; LOGIN &nbsp;&nbsp;</b>
            </a>
            <span class="navbar-text text-light">&nbsp; OR</span>
            <a href="/SerieTv/registrazione.php" class="btn navbar-btn ml-2 text-primary btn-light">
              <b>&nbsp;&nbsp; REGISTRATI &nbsp;&nbsp;</b>
            </a>            
          </ul>
        {/if}
    </form>
    </div>
  </nav>
</div>