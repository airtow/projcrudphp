<?php 

	require_once __DIR__ . '/vendor/autoload.php';
	
	$sql_code = "SELECT a.nome AS alunonome, a.id_curso, c.nome AS cursonome, c.id_curso, c.id_professor, p.nome AS professornome, p.id_professor FROM aluno a
		INNER JOIN curso c ON a.id_curso = c.id_curso 
		INNER JOIN professor p ON c.id_professor = p.id_professor";

	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	while($linha = $sql_query->fetch_assoc()){

			echo $linha['alunonome'];
			echo $linha['cursonome'];
			echo $linha['professornome'];
		}

	$pagina ="
<html>
<body>
<h1>Vintage Locadora</h1>
<h2>Histórico de Locações de Clientes</h2>

<h3>Dados do Cliente</h3>

<table>
  <tr>
    <th>Nome</th>
    <th>CPF</th>
    <th>Telefone 1</th>
    <th>Telefone 2</th>
    <th>Cidade</th>
    <th>Rua</th>
    <th>Numero</th>
  </tr>
  <tr>
    <td>$linha['alunonome']</td>
    <td>$linha['cursonome']</td>
    <td>$tel1</td>
    <td>$tel2</td>
    <td>$cidade</td>
    <td>$rua</td>
    <td>$numero</td>
  </tr>
</table>

<h3>Histórico de Locações de Fita</h3>

<table>
  <tr>
    <th>Nome do Cliente</th>
    <th>Filme Locado</th>
    <th>Valor da Locação</th>
    <th>Multa</th>
    <th>Data da Locação</th>
    <th>Data de Entrega</th>
  </tr>
  <tr>
    <td>$cliente</td>
    <td>$filme</td>
    <td>$valor</td>
    <td>$multa</td>
    <td>$dataL</td>
    <td>$dataE</td>
  </tr>
</table>
</body>
</html>
";

$arquivo ='vintage.pdf';
$pdf = new mPDF();
$css = file_get_contents('css/historico-estilo.css');
$pdf->WriteHTML($css, 1);
$pdf->WriteHTML($pagina);
$pdf->Output($arquivo, 'I');

?>
			
	


	