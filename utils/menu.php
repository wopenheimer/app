<?php

  include_once("utils/utils.php");

  menu();
  
  function menu() {
    $template = "comum_" . "menu";
    render(null, $template);	
  }
?>

