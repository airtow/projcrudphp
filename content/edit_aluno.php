<?php
	$usu_id_aluno = intval($_GET['aluno']);

	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "UPDATE aluno  SET 
		nome = '$_SESSION[nome]',
		data_nascimento = '$_SESSION[data_nasc]',
		logradouro = '$_SESSION[logradouro]',
		numero = '$_SESSION[numero]',
		bairro = '$_SESSION[bairro]',
		cidade = '$_SESSION[cidade]',
		estado = '$_SESSION[estado]',
		cep = '$_SESSION[cep]',
		id_curso = '$_SESSION[curso]'
		WHERE id_aluno = '$usu_id_aluno'";
		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
		
		echo "<script> location.href='index.php?p=ini_aluno'</script>";
	}else{
		$sql_code = "SELECT * FROM aluno WHERE id_aluno = '$usu_id_aluno'";
		$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		$linha = $sql_query->fetch_assoc();
		
		if (!isset($_SESSION)) {
			session_start();

		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['data_nasc'] = $linha['data_nascimento'];
		$_SESSION['logradouro'] = $linha['logradouro'];
		$_SESSION['numero'] = $linha['numero'];
		$_SESSION['bairro'] = $linha['bairro'];
		$_SESSION['cidade'] = $linha['cidade'];
		$_SESSION['estado'] = $linha['estado'];
		$_SESSION['cep'] = $linha['cep'];
		$_SESSION['curso'] = $linha['id_curso'];

	}
}
?>


<h1>Atualizar Cadastro de Aluno</h1>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<a href='index.php?p=ini_aluno'><br />Voltar para ALUNOS<br /></a>

<form class="form-detail" action="index.php?p=edit_aluno&aluno=<?php echo $usu_id_aluno?>" method="POST">
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>" required>
	<br /><br />
	
	<div class="form-row">
	<label for="data_nasc">Data de Nascimento</label>
	<input type="date" id="data_nasc" name="data_nasc" value="<?php echo $_SESSION['data_nasc']; ?>" required>
	<br /><br />
	</div>
	<div class="form-row">
	<label for="cep">CEP </label>
	<input type="text" id="cep" name="cep" value="<?php echo $_SESSION['cep']; ?>" required>
	<br /><br />
	</div>
	<label for="logradouro">Logradouro</label>
	<input type="" id="logradouro" name="logradouro" value=<?php echo $_SESSION['logradouro']; ?>"" required>
	<br /><br />
	<div class="form-row">
	<label for="numero">Número</label>
	<input type="text" id="numero" name="numero" value="<?php echo $_SESSION['numero']; ?>" required>
	<br /><br />
	</div>
	<label for="bairro">Bairro</label>
	<input type="text" id="bairro" name="bairro" value="<?php echo $_SESSION['bairro']; ?>" required>
	<br /><br />

	<label for="estado">Estado</label>
	<input type="text" id="estado" name="estado" value="<?php echo $_SESSION['estado']; ?>" required>
	<br /><br />

	<label for="cidade">Cidade</label>
	<input type="text" id="cidade" name="cidade" value="<?php echo $_SESSION['cidade']; ?>" required>
	<br /><br />
	<div class="form-row">
	<label for="curso">ID do Curso</label>
	<input type="text" id="curso" name="curso" value="<?php echo $_SESSION['curso']; ?>" required>
	<a href='index.php?p=ini_curso' target="_blanck">Visualizar IDs de Cursos.</a>
	<br /><br />
	</div>
	<div class="form-row-last">
	<input value="Atualizar" name="cadastro" class="register" type="submit">
	<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>

</div>
</form>

<script type="text/javascript">
		$("#cep").focusout(function(){
				$.ajax({
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				dataType: 'json',
					success: function(resposta){
					$("#logradouro").val(resposta.logradouro);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#estado").val(resposta.uf);
					$("#numero").focus();
				}
			});
		});
</script>