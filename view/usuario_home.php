<?php

$usuarios = $args;

print '<h3>Usuários</h3>';

print '
<table class="table">
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Paciente</th>
		<th>Opções</th>
	</tr>';
	for($i = 0; $i < sizeof($usuarios); $i++){
		$usuario = $usuarios[$i];
		print '<tr>
			<td>' .$usuario->getId(). '</td>
			<td>' .$usuario->getEmail() .'</td>
			<td>' .$usuario->getPaciente()->getNome() .'</td>
			<td>
			<a href="/usuario/edit/' .$usuario->getId() .'" class="btn btn-default" role="button">
				<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			</a>
			<a href="/usuario/remove/' .$usuario->getId() .'" class="btn btn-default" role="button">
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			</a>

			</td>
		</tr>';		
	}
print '</table>';
?>




<a href="/usuario/add" role="button" class="btn btn-primary" data-toggle="modal">Adicionar Usuário</a>


