<?php
	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "INSERT INTO professor (
		nome,
		data_nascimento		
		)
		VALUES(
		'$_SESSION[nome]',
		'$_SESSION[data_nasc]'
		)";
		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
		
		echo "<script> location.href='index.php?p=ini_prof'</script>";

	}
?>

<h1>Cadastrar Professor</h1>

<a href='index.php?p=ini_prof'><br />Voltar para PROFESSORES<br /><br /></a>

<form class="form-detail" action="index.php?p=cad_prof" method="POST">
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="" required>
	<br /><br />
	<div class="form-row">
	<label for="data_nasc">Data de Nascimento</label>
	<input type="date" id="data_nasc" name="data_nasc" value="" required>
	<br /><br />
	</div>
	<div class="form-row-last">
	<input value="Cadastrar" name="cadastro" class="register" type="submit">
	<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>
	</div>
	
</form>