<?php

include_once("model/paciente.php");
include_once("utils/utils.php");

switch ($_REQUEST["page"]) {
    case 'home':
	   home();
       break;
	case 'processar_imc':
		processar_imc();
		break;	
	case 'add':
		add();
		break;	
	default:
		# code...
		break;
}


function home() {
   $paciente = new Paciente();
   $pacientes = $paciente->getPacientes();
   $template = "paciente_" . "home";
   render($pacientes, $template);	
}

function add(){
	$paciente = new Paciente();
	$paciente->setCpf($_POST["cpf"]);
	$paciente->setNome($_POST["nome"]);
	$paciente->setDatanasc($_POST["datanasc"]);
	$paciente->setPeso($_POST["peso"]);
	$paciente->setAltura($_POST["altura"]);

	$result = $paciente->add();
	$template = "paciente_" . "show_message";

	if ($result) {
		$args['message'] = "Inserido com sucesso!";	
	} else {
		$args['message'] = "Houve uma falha na insercao.";	
	}
	render($args, $template);}


function processar_imc(){
	$peso = $_POST["peso"];
	$altura = $_POST["altura"];
	$imc = Paciente::getImcQualquerPessoa($peso, $altura);
	$template = "paciente_" . "show_message";
	$args['message'] = "IMC calculado: ";
	$args['content'] = $imc;
	render($args, $template);
}

?>

