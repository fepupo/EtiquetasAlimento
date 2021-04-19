<?php
	$host = 'localhost';
	$bd = 'gororoba';
	$user = 'root' ; 
	$pass='root';
	$con = new mysqli($host, $user, $pass, $bd);
	if (!$con) {
		die('A conexão falhou.'.mysqli_connect_error());
	}
	else{
		//print '<h1>Conexão realizada com sucesso!</h1><br>';
	}
?>