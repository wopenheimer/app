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
    <link href="view/css/estilo.css" rel="stylesheet">

  </head>
  <body>
    
    <?php
      include("utils/menu.php");
    ?>
 
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