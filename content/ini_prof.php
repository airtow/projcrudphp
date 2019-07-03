<?php
	$sql_code = "SELECT * FROM professor";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$linha = $sql_query->fetch_assoc();
?>


<h1>Base de Dados de Professores</h1>

	<a href="index.php?p=cad_prof">Cadastrar Professor<br /></a>
	<br /><br />

	<table cellpadding="10">
		<tr bgcolor="#436EEE">
			<td>ID Professor</td>
			<td>Nome</td>
			<td>Data de Nascimento</td>
			<td>Data de Cadastro</td>
			
			<td>Ação</td>
		</tr>
		<?php
		do{
		?>
		<tr>
			<td><?php echo $linha['id_professor']; ?></td>
			<td><?php echo $linha['nome']; ?></td>
			<td><?php 
			$n = explode(" ", $linha['data_nascimento']);
			$nasc = explode("-", $n[0]);
			echo "$nasc[2]/$nasc[1]/$nasc[0]";
			?></td>
			<td><?php 
			$d = explode(" ", $linha['data_criacao']);
			$data = explode("-", $d[0]);
			echo "$data[2]/$data[1]/$data[0] às $d[1]"; 
			?></td>
			<td>
				<a href="index.php?p=edit_prof&professor=<?php echo $linha['id_professor']; ?>">Editar |</a>
				<a href="javascript: if(confirm('Tem certeza que deseja deletar o professor <?php echo $linha['nome']; ?> ?')) location.href='index.php?p=del_prof&professor=<?php echo $linha['id_professor']; ?>';">Deletar</a>

			</td>
		</tr>
		<?php 
			}while($linha = $sql_query->fetch_assoc());
		?>
	</table>		

<a href='index.php'><br />Voltar para PÁGINA INICIAL</a>