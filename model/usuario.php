<?php
include_once("dao/usuario_dao.php");
include_once("paciente.php");

class Usuario
{
	private $id;
	private $email;
	private $senha;
	private $usuario;
        
    private $usuario_dao;
    
    function __construct() {
        $this->usuario_dao = new UsuarioDao();
    }

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setPaciente($paciente_cpf){
		$paciente = new Paciente();
		$paciente_obj = $paciente->getPacienteByCpf($paciente_cpf);
		$this->paciente = $paciente_obj;
	}

	public function getPaciente(){
		return $this->paciente;
	}

        
	public function getUsuarios() {            
            
        $usuarios = $this->usuario_dao->getUsuarios();
        
        $array_usuarios = [];        
        if ($usuarios){
	        foreach ($usuarios as $v_usuario) {
	            $usuario = new Usuario();
	            $usuario->setId($v_usuario["id"]);
	            $usuario->setEmail($v_usuario["email"]);
	            $usuario->setSenha($v_usuario["senha"]);
	            $usuario->setPaciente($v_usuario["paciente_cpf"]);
	            $array_usuarios[] = $usuario;
	        }
    	}
        
        return $array_usuarios;
	}	

	public function getUsuarioById($id) {                        
        $v_usuario = $this->usuario_dao->getUsuarioById($id);
        
        $usuario = new Usuario();
        $usuario->setId($v_usuario->id);
        $usuario->setEmail($v_usuario->email);
        $usuario->setSenha($v_usuario->senha);
        $usuario->setPaciente($v_usuario->paciente_cpf);

        return $usuario;
	}		
        

	public function add() {                        
        $result = $this->usuario_dao->add($this);        
        return $result;
	}	        


	public function edit() {                        
        $result = $this->usuario_dao->edit($this);        
        return $result;
	}	        


	public function remove() {                        
        $result = $this->usuario_dao->remove($this);        
        return $result;
	}	        	


}

?>
