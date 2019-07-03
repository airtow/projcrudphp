<?php
	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "INSERT INTO curso (
		nome,
		id_professor		
		)
		VALUES(
		'$_SESSION[nome]',
		'$_SESSION[professor]'
		)";
		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
	
		echo "<script> location.href='index.php?p=ini_curso'</script>";

	}
?>

<h1>Cadastrar Curso</h1>

<a href='index.php?p=ini_curso'><br />Voltar para CURSOS<br /><br /></a>

<form class="form-detail" action="index.php?p=cad_curso" method="POST">
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="" required>
	<br /><br />
	<div class="form-row">
	<label for="professor">ID do Professor</label>
	<input type="text" id="professor" name="professor" value="" required>
	</div>
	<a href='index.php?p=ini_prof' target="_blanck">Consultar IDs de Professores.</a>
	<br />
	<div class="form-row-last">
	<input value="Cadastrar" name="cadastro" class="register" type="submit">
	<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>
	</div>

</form>

