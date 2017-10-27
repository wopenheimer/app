<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function render($args, $template){
    include("view/" . $template . ".php");
}


function validInputData($var) {
    if (isset($var)) {
        $var = strip_tags($var);
        $var = addslashes($var);
        $var = trim($var);
        $var = pg_escape_string($var);   
        $chars = [";", "-", "&", "%", "#", "$", "*", "|", "="];
        foreach ($chars as $key => $value) {
            $var = str_replace($value, "", $var);   
        }
        return $var;            
    } else {
        return null;
    }
}   


function validInputDate($data){
    if ( strlen($data) < 8){
        return false;
    }else{
        if(strpos($data, "/") !== FALSE){
            $partes = explode("/", $data);
            $dia = $partes[0];
            $mes = $partes[1];
            $ano = isset($partes[2]) ? $partes[2] : 0;

            if (strlen($ano) < 4) {
                return false;
            } else {
                if (checkdate($mes, $dia, $ano)) {
                     return true;
                } else {
                     return false;
                }
            }
        }else{
            return false;
        }
    }
}

function validInputEmail($email){
    if (!preg_match("/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/",$email)){
        return false;
    } else {
        $dominio=explode('@',$email);
        if(!checkdnsrr($dominio[1],'A')){
                return false;
        } else {
            return true;                
        }
    }
}    


?>

