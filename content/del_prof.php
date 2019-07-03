<?php 
	include("conexao.php");

	$usu_id_professor = intval($_GET['professor']);

	$sql_code = "DELETE FROM professor WHERE id_professor = '$usu_id_professor'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query){
		echo "<script> location.href='index.php?p=ini_prof' </script>";
	}else
		echo "<script> alert(Não foi possível deletar o usuário.'); location.href='index.php?p=prof' </script>";

?>