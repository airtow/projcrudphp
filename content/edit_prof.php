<?php

	$usu_id_professor = intval($_GET['professor']);

	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "UPDATE professor  SET 
		nome = '$_SESSION[nome]',
		data_nascimento = '$_SESSION[data_nasc]'
		WHERE id_professor = '$usu_id_professor'";

		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
	
		echo "<script> location.href='index.php?p=ini_prof'</script>";
	}else{
		$sql_code = "SELECT * FROM professor WHERE id_professor = '$usu_id_professor'";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		$linha = $sql_query->fetch_assoc();
		
		if (!isset($_SESSION)) {
			session_start();

		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['data_nasc'] = $linha['data_nascimento'];
		
		}
	}
?>

<h1>Editar Cadastro de Professor</h1>

<a href='index.php?p=ini_prof'><br />Voltar para PROFESSORES<br /><br /></a>

<form action="index.php?p=edit_prof&professor=<?php echo $usu_id_professor?>" method="POST">
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>" required>
	<br /><br />
	<div class="form-row">
	<label for="data_nasc">Data de Nascimento</label>
	<input type="date" id="data_nasc" name="data_nasc" value="<?php echo $_SESSION['data_nasc']; ?>" required>
	<br /><br />
	</div>
	<div class="form-row-last">
	<input value="Atualizar" name="cadastro" class="register" type="submit">
	<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>
	</div>
</form>