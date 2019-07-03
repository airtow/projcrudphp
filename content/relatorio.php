<?php

  require_once __DIR__ . '/vendor/autoload.php';

  $sql_code = "SELECT a.nome AS alunonome, a.id_curso, c.nome AS cursonome, c.id_curso, c.id_professor, p.nome AS professornome, p.id_professor FROM aluno a
    INNER JOIN curso c ON a.id_curso = c.id_curso 
    INNER JOIN professor p ON c.id_professor = p.id_professor";

  $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
  $linha = $sql_query->fetch_assoc();

  $html='<h1>PDF</h1>

  <table cellpadding="3" >
    <tr bgcolor="#436EEE">
      <td>Aluno</td>
      <td>Curso</td>
      <td>Professor</td>
      
      
    </tr>
    <?php
    do{
    ?>
    <tr>
      <td> '.$linha['alunonome'].'</td> 
      <td> '.$linha['cursonome'].'</td>
      <td> '.$linha['professornome'].'</td>
      
    </tr>
    <?php 
      }while($linha = $sql_query->fetch_assoc());
    ?>
  </table>';
  error_reporting(E_ALL);
  $mpdf=new Mpdf\Mpdf(); 
  $mpdf->SetDisplayMode('fullpage');
  $mpdf->WriteHTML($html);
  $mpdf->Output();

 exit;

?>