<?php 

	$host = "localhost";
	$bd = "flexpeakcrud";
	$user = "root";
	$senha = "";

	$mysqli = new mysqli($host, $user, $senha, $bd);
	$mysqli->set_charset('utf8');
	if ($mysqli->connect_error) {
		echo "Falha na conexao: (".$mysqli->connect_error.") ".$mysqli->connect_error;
	}

?>