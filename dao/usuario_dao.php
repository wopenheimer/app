<?php

include_once("dao.php");

class UsuarioDao extends Dao {
    
    public function getUsuarios() {
        $sql = "select * from usuario order by id;";
        $param = array();
        $result = $this->executaQuery($sql, $param);
        return $this->getFetchAll($result);        
    }
    

    public function getUsuarioById($id) {
        $sql = "select * from usuario where id = $1;";
        $param = array();
        array_push($param, $id);
        $result = $this->executaQuery($sql, $param);
        return $this->getFetchObject($result);        
    }


    public function add($usuario) {
        $sql = 'insert into usuario (email, senha, paciente_cpf) ';
        $sql .= 'values ($1, $2, $3);';
        $param = array();
        array_push($param, $usuario->getEmail(), $usuario->getSenha(), $usuario->getPaciente()->getCpf());

        $result = $this->executaQuery($sql, $param);
        return $result;        
    }    


    public function edit($usuario) {
        $sql = 'update usuario set email = $1, senha = $2, paciente_cpf = $3 ';
        $sql .= 'where id = $4;';
        $param = array();
        array_push($param, $usuario->getEmail(), $usuario->getSenha(), $usuario->getPaciente()->getCpf(), $usuario->getId());

        $result = $this->executaQuery($sql, $param);
        return $result;        
    }        


    public function remove($usuario) {
        $sql = 'delete from usuario where id = $1;';
        $param = array();
        array_push($param, $usuario->getId());

        $result = $this->executaQuery($sql, $param);
        return $result;        
    }        

}

?>