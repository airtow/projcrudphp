<?php 
	
	$sql_code = "SELECT a.nome AS alunonome, a.id_curso, c.nome AS cursonome, c.id_curso, c.id_professor, p.nome AS professornome, p.id_professor FROM aluno a
		INNER JOIN curso c ON a.id_curso = c.id_curso 
		INNER JOIN professor p ON c.id_professor = p.id_professor";

	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
		$linha = $sql_query->fetch_assoc();
?>
	<table cellpadding="10">
		<tr bgcolor="#436EEE">
			<td>Aluno</td>
			<td>Curso</td>
			<td>Professor</td>
		</tr>
		<?php
		do{
		?>
		<tr>
			<td><?php echo $linha['alunonome']; ?></td>
			<td><?php echo $linha['cursonome']; ?></td>
			<td><?php echo $linha['professornome'];	?></td>
		</tr>
		<?php 
			}while($linha = $sql_query->fetch_assoc());
		?>	
	</table>
<?php
	
	use Dompdf\Dompdf;

	require_once("dompdf/autoload.inc.php");

	$dompdf = new DOMPDF();

	$dompdf->load_html('
		
		');
	$dompdf->render();

	$dompdf->stream(
		relatorio,
		array(
			"Attachment" => true
		)
	);

?>




	