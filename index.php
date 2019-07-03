<?php include("conexao/conexao.php"); 

ini_set('display_errors', 0 );
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
	Controle de Alunos | Professores | Cursos	
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
  
	
</head>
<body class="main">
	<div class="page-content">
		<div class="main-content" style="background-image: url('images/rod.jpg'); opacity : 0.9">
			<div class="form-detail">

			<?php 
			if (isset($_GET['p'])) {
				$pagina = $_GET['p'].".php";
				if (is_file("content/$pagina")) {
					include("content/$pagina");
				}else 
					include("content/404.php");
			}else
				include("content/gerenciamento.html");
		 ?>
			</div>
		</div>
	</div>


</body>
</html>