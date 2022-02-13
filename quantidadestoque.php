<?php 
session_start();
include_once("conexao.php");
include_once('navbar.html');
?>


<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Quantidade Total</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
	</head>	
  <body>
  <div class="container">
  <img src="img/sualogoaqui.png" style="width:80px;" class="rounded mx-auto d-block" style="padding: 5%;">
    <div class="row align-items-center">
      <div class="col">
          <table> 
            <?php 
            $query = "SELECT count(id) AS total FROM post WHERE produto = 'Bematech'";
            $queryProdu = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($queryProdu);
            $num_rows = $row['total'];
            echo "<div class='table-primary'> Impressoras Cadastradas : " . $num_rows . "</div>";
            /* Busca pelo estoque de Impressoras */
            $qryImpri = "SELECT * FROM post WHERE situacao = 'Estoque' AND produto = 'Bematech'";
            $qryImpressora = mysqli_query($conn, $qryImpri);
            $row_Impressora = mysqli_num_rows($qryImpressora);
            echo "<div class='table-danger'> Impressoras no Estoque : " . $row_Impressora . "</div>";
          
            $qryAluguel = "SELECT * FROM post WHERE situacao = 'Aluguel' AND produto = 'Bematech'";
            $qryAlugado = mysqli_query($conn, $qryAluguel);
            $row_aluguel = mysqli_num_rows($qryAlugado);
            echo "<div class='table-light'>  Impressoras Alugadas :  " . $row_aluguel . "</div>";

            $qryManut = "SELECT * FROM post WHERE situacao = 'Manutencao' AND produto = 'Bematech'";
            $qryManutencao = mysqli_query($conn, $qryManut);
            $row_manute = mysqli_num_rows($qryManutencao);
            echo "<div class='table-light'>  Impressoras Manutenção :  " . $row_manute . "</div>";
            ?>
          </table> 
      </div>
      <div class="col">
          <table>
            <?php 
            $qry = "SELECT count(id) AS total FROM post WHERE situacao = 'Estoque' and produto = 'Touch TM-15'";
            $qryProdu = mysqli_query($conn, $qry);
            $row_qry = mysqli_fetch_array($qryProdu);
            $num_rows = $row_qry['total'];
            echo " <div class='table-light'>  Touch TM-15 Estoque: " . $num_rows . "</div><br>";
            ?>
          </table>
      </div>
      <div class="col">
          <table>
            <?php 
              $qryT = "SELECT count(id) AS total FROM post WHERE situacao = 'Estoque' and produto = 'Bematech RC 8400'";
              $qryTela = mysqli_query($conn, $qryT);
              $row_qryT = mysqli_fetch_array($qryTela);
              $num_rows = $row_qryT['total'];
              echo " <div class='table-light'>  Bematech RC 8400 Estoque: " . $num_rows . "</div><br>";
            ?> 
          </table> 
      </div>
  </div>
  </div>
  </body>
</html>
