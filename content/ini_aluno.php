<?php
	$sql_code = "SELECT * FROM aluno";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$linha = $sql_query->fetch_assoc();
?>


<h1>Base de Dados de Alunos</h1>

	<a href="index.php?p=cad_aluno">Cadastrar Aluno<br /></a>
	<br /><br />

	<table cellpadding="3" >
		<tr bgcolor="#436EEE">
			<td>ID Aluno</td>
			<td>Nome</td>
			<td>Data de Nascimento</td>
			<td>Logradouro</td>
			<td>Número</td>
			<td>CEP</td>
			<td>Bairro</td>
			<td>Cidade</td>
			<td>Estado</td>
			<td>Data de cadastro</td>
			<td>ID Curso</td>

			<td>Ação</td>
		</tr>
		<?php
		do{
		?>
		<tr>
			<td><?php echo $linha['id_aluno']; ?></td>	
			<td><?php echo $linha['nome']; ?></td>
			<td><?php 
			$n = explode(" ", $linha['data_nascimento']);
			$nasc = explode("-", $n[0]);
			echo "$nasc[2]/$nasc[1]/$nasc[0]";
			?></td>
			<td><?php echo $linha['logradouro']; ?></td>
			<td><?php echo $linha['numero']; ?></td>
			<td><?php echo $linha['bairro']; ?></td>
			<td><?php echo $linha['cidade']; ?></td>
			<td><?php echo $linha['estado']; ?></td>
			<td><?php echo $linha['cep']; ?></td>
			<td><?php 
			$d = explode(" ", $linha['data_criacao']);
			$data = explode("-", $d[0]);
			echo "$data[2]/$data[1]/$data[0] às $d[1]"; 
			?></td>
			<td><?php echo $linha['id_curso']; ?></td>

			<td>
				<a href="index.php?p=edit_aluno&aluno=<?php echo $linha['id_aluno']; ?>">Editar</a>
				<a href="javascript: if(confirm('Tem certeza que deseja deletar o aluno <?php echo $linha['nome']; ?> ?')) location.href='index.php?p=del_aluno&aluno=<?php echo $linha['id_aluno']; ?>';">Deletar</a>
			</td>
		</tr>
		<?php 
			}while($linha = $sql_query->fetch_assoc());
		?>
	</table>		
<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>
