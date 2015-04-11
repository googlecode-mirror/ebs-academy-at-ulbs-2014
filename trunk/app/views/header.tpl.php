<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">LOGO</a>
       
   
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo myUrl('teme/showTeme'); ?>">Tema Licenta</a></li>
        <li><a href="<?php echo myUrl('news/showNews'); ?>">Noutati</a></li>
        <li><a href="#">Prezenta</a></li>
        <li><a href="<?php echo myUrl('main/suportCurs'); ?>">Suport Curs</a></li>
        <li><a href="#">Teste</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo myUrl('administrare'); ?>">Administrare<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo myUrl('administrare/show_users'); ?>"> Afisare Studenti </a></li>
            <li><a href="<?php echo myUrl('administrare/add_user'); ?>"> Adauga Studenti </a></li>
            <li><a href="<?php echo myUrl('administrare/show_grup') ?>"> Afisaza grupe </a></li>
            <li><a href="<?php echo myUrl('administrare/show_materii') ?>"> Afiseaza materii </a></li>
          </ul>
        </li>
      </ul>
    
     
        <div class="nav navbar-nav navbar-right">
     <a href="<?php echo myUrl('main/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a>       
     <button type="button" class="btn btn-link"><a href="<?php echo myUrl('main/new'); ?>"><span class="glyphicon glyphicon-user"></span> New Account</a></button>
        </div>
          </div>
        </div>
</nav>