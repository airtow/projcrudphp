<?php
	if(!isset($_GET['curso'])){
		echo "<script> alert('Codigo invalido.'); location.href=index.php?p=ini_curso'; </script>";
	}
	else{

	$usu_id_curso = intval($_GET['curso']);
	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "UPDATE curso  SET 
		nome = '$_SESSION[nome]',
		id_professor = '$_SESSION[professor]'
		WHERE id_curso = '$usu_id_curso'";

		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
	
		echo "<script> location.href='index.php?p=ini_curso'</script>";
		}else{
		$sql_code = "SELECT * FROM curso WHERE id_curso = '$usu_id_curso'";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		$linha = $sql_query->fetch_assoc();
		
		if (!isset($_SESSION)) {
			session_start();

		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['professor'] = $linha['id_professor'];
		
	}
	}
?>

<h1>Editar Curso cadastrado</h1>

<a href='index.php?p=ini_curso'><br />Voltar para CURSOS<br /><br /></a>

<form class="form-detail" action="index.php?p=edit_curso&curso=<?php echo $usu_id_curso?>" method="POST">
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>" required>
	<br /><br />
	<div class="form-row">
	<label for="professor">ID do Professor</label>
	<input type="text" id="professor" name="professor" value="<?php echo $_SESSION['professor']; ?>" required>
	</div>
	<a href='index.php?p=ini_prof' target="_blanck">Consultar IDs de Professores.</a>
	<br />
	<div class="form-row-last">
	<input value="Atualizar" name="cadastro" class="register" type="submit">
	<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>
	</div>
</form>
<?php } ?>