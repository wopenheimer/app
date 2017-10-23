<?php

include_once("dao.php");

class PacienteDao extends Dao {
    
    public function getPacientes() {
        $sql = "select * from paciente order by cpf;";
        $param = array();
        $result = $this->executaQuery($sql, $param);
        return $this->getFetchAll($result);        
    }
    

    public function add($paciente) {
        $sql = 'insert into paciente (cpf, nome, datanasc, peso, altura) ';
        $sql .= 'values ($1, $2, $3, $4, $5);';
        $param = array();
        array_push($param, $paciente->getCpf(), $paciente->getNome(),
        			$paciente->getDatanasc(), $paciente->getPeso(), $paciente->getAltura());

        $result = $this->executaQuery($sql, $param);
        return $result;        
    }    
}

?>