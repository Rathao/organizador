<?php 

	$acao = 'inserir_usuario';
	require "tarefa_controller.php";
	
	 
// varialvel que verifica se autenticação foi realizada
$usuarios_autenticado = false;
$usuario_id = null;

foreach ($usuarios_app as $key=>$login_usuario) {

	 if ($login_usuario->email == $_POST['email'] && $login_usuario->senha == $_POST['senha']) { 
		$usuarios_autenticado = true;		
		 $usuario_id = $login_usuario->id_usuario;		
    }
}

if ($usuarios_autenticado) {
	$_SESSION['autenticado'] = 'SIM';
	$_SESSION['id_usuario'] = $usuario_id ;	
    header('Location: nova_tarefa.php');
}else {
	$_SESSION['autenticado'] = 'nao';
	header('Location: organizador.login.php?login=erro');
}



?>