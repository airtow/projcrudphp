<?php 
	include("conexao.php");

	$usu_id_aluno = intval($_GET['aluno']);

	$sql_code = "DELETE FROM aluno WHERE id_aluno = '$usu_id_aluno'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query){
		

		echo "<script> location.href='index.php?p=ini_aluno' </script>";
	}else
		echo "<script> alert(Não foi possível deletar o usuário.'); location.href='index.php?p=ini_aluno' </script>";

?>