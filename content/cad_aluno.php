<?php
	if(isset($_POST['cadastro'])){

		if (!isset($_SESSION)) {
			session_start();
		}
		foreach ($_POST as $key => $value) {
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}

		$sql_code = "INSERT INTO aluno (
		nome,
		data_nascimento,
		logradouro,
		numero,
		bairro,
		cidade,
		estado,
		cep,
		id_curso
		)
		VALUES(
		'$_SESSION[nome]',
		'$_SESSION[data_nasc]',
		'$_SESSION[logradouro]',
		'$_SESSION[numero]',
		'$_SESSION[bairro]',
		'$_SESSION[cidade]',
		'$_SESSION[estado]',
		'$_SESSION[cep]',
		'$_SESSION[curso]'		
		)";
		$cadastro = $mysqli->query($sql_code) or die ($mysqli->error);
		
		echo "<script> location.href='index.php?p=ini_aluno'</script>";
	}
?>


<h1>Cadastrar Aluno</h1>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<a href='index.php?p=ini_aluno'><br />Voltar para ALUNOS<br /></a>

<form class="form-detail" action="index.php?p=cad_aluno" method="POST">

	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value="" required>
	<p></p>
	<div class="form-row">
	<label for="data_nasc">Data de Nascimento</label>
	<input type="date" id="data_nasc" name="data_nasc" value="" required>
	<p></p>
	</div>
	<div class="form-row">
	<label for="cep">CEP </label>
	<input type="text" id="cep" name="cep" value="" required>
	<p></p>
	</div>
	<label for="logradouro">Logradouro</label>
	<input type="" id="logradouro" name="logradouro" value="" required>
	<p></p>
	<div class="form-row">
	<label for="numero">Número</label>
	<input type="text" id="numero" name="numero" value="" required>
	<p></p>
	</div>
	<label for="bairro">Bairro</label>
	<input type="text" id="bairro" name="bairro" value="" required>
	<p></p>

	<label for="estado">Estado</label>
	<input type="text" id="estado" name="estado" value="" required>
	<p></p>

	<label for="cidade">Cidade</label>
	<input type="text" id="cidade" name="cidade" value="" required>
	<p></p>
	<div class="form-row">
	<label for="curso">ID do Curso</label>
	<input type="text" id="curso" name="curso" value="" required>
	<a href='index.php?p=ini_curso' target="_blanck">Visualizar IDs de Cursos</a>
	<p></p>
	</div>
	<div class="form-row-last">
	<input value="Cadastrar" name="cadastro" class="register" type="submit">

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