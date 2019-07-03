<?php
	include("conexao/conexao.php");
	$sql_code = "SELECT * FROM curso";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$linha = $sql_query->fetch_assoc();
?>

<h1>Base de Dados de Cursos</h1>

	<a href="index.php?p=cad_curso">Cadastrar Curso<br /></a>
	<br /><br />

	<table cellpadding="10">
		<tr bgcolor="#436EEE">
			<td>ID Curso</td>
			<td>Nome</td>
			<td>Data de Cadastro</td>
			<td>ID do Professor</td>
			
			<td>Ação</td>
		</tr>
		<?php
		do{
		?>
		<tr>
			<td><?php echo $linha['id_curso']; ?></td>
			<td><?php echo $linha['nome']; ?></td>
			<td><?php 
			$d = explode(" ", $linha['data_criacao']);
			$data = explode("-", $d[0]);
			echo "$data[2]/$data[1]/$data[0] às $d[1]"; 
			?></td>
			<td><?php echo $linha['id_professor']; ?></td>
		

			<td>
				<a href="index.php?p=edit_curso&curso=<?php echo $linha['id_curso']; ?>">Editar |</a>
				<a href="javascript: if(confirm('Tem certeza que deseja deletar o curso <?php echo $linha['nome']; ?> ?')) location.href='index.php?p=del_curso&curso=<?php echo $linha['id_curso']; ?>';">Deletar</a>
			</td>
		</tr>
		<?php 
			}while($linha = $sql_query->fetch_assoc());
		?>
	</table>		

<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>