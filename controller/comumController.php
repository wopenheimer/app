<?php

include_once("utils/utils.php");

switch ($_REQUEST["page"]) {
    case 'login':
	   login();
       break;
}


function login() {
   $template = "comum_" . "login";
   render(null, $template);	
}

?>