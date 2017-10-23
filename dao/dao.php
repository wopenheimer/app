<?php

class Dao {

    private $dbhost;
    private $dbusuario;
    private $dbsenha;
    private $dbport;
    private $dbname;
    private $condb;
    private $query;
    private $result;
    private $dbtipo;

    function __construct() {
            $this->dbhost = "localhost";
            $this->dbusuario = "postgres";
            $this->dbsenha = "postgres";
            $this->dbport = "5432";
            $this->dbname = "clinica";
    }


    private function conecta_postgres() {

        $this->condb = pg_connect("host=$this->dbhost port=$this->dbport dbname=$this->dbname user=$this->dbusuario password=$this->dbsenha");
        if (pg_connection_status($this->condb) !== 0) {
            echo "Não foi possível conectar ao banco de dados.<br>";
            die();
        }
    }


    private function desconecta_postgres() {
        pg_connection_status($this->condb) === 0 ? (!pg_connection_busy($this->condb) ? pg_close($this->condb) : false) : false;
    }

    public function executaQuery($query, $params) {
            $this->conecta_postgres();
            $this->query = $query;

            $result = pg_prepare($this->condb, "query", $this->query);

            if ($this->result = pg_execute($this->condb, "query", $params)) {
                $this->desconecta_postgres();
                return $this->result;
            } else {
//                echo "Ocorreu um erro na execução da SQL.<br>";
//                echo "<br>" . pg_last_error();
//                echo "<br>SQL: " . $query;
                $this->desconecta_postgres();
                return false;
            }
    }
    
    function getNumRows($query) {
            return pg_num_rows($query);
    }    
    
    function getFetchObject($query) {
            return pg_fetch_object($query);
    }  
    
    function getFetchArray($query) {
            return pg_fetch_array($query);
    }
    
    function getFetchAll($query) {
            return pg_fetch_all($query);
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
    

}


?>
