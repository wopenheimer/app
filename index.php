<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Clínicas Médicas</title>

    <!-- Bootstrap -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Gestão de Clínicas Médicas</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Gestão de Clínicas Médicas</a>
      </div>
      <ul class="nav nav-pills">
          <li class="active"><a href="?module="><span class="glyphicon glyphicon-home"></span>  Home</a></li>
          <li><a href="?module=paciente&page=home"><span class="glyphicon glyphicon-user"></span> Pacientes</a></li>
          <li><a href="?module=consulta&page=home"><span class="glyphicon glyphicon-tags"></span> Consultas</a></li>
      </ul>
    </div>      

    <div class="container">
        <?php

          $module = $_REQUEST["module"];
          $page = $_REQUEST["page"];
          
          if(isset($module) && $module != ""){
            if(isset($page) && $page != ""){
              include("controller/" . $module ."Controller.php");
            }
          } 
          
          
        ?>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="view/js/bootstrap.min.js"></script>
  </body>
</html>