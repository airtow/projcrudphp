<?php 
	include("conexao.php");

	$usu_id_curso = intval($_GET['curso']);

	$sql_code = "DELETE FROM curso WHERE id_curso = '$usu_id_curso'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query){
		

		echo "<script> location.href='index.php?p=ini_curso' </script>";
	}else
		echo "<script> alert(Não foi possível deletar o usuário.'); location.href='index.php?p=ini_curso' </script>";

?>