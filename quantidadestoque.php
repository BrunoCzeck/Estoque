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
    <style>
	* {
		font-family: Sans-serif ; 
		
	}

  body{

  background-image: linear-gradient(to right,#C1CDC1, #32CD32);	
  
}
	
	</style>
	</head>	
	
<body>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a href="form.php">
<img src="img/campotvlogo.png" class="rounded mx-auto d-block">
  </a>
  <div class="container-fluid">
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
	<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="form_saida.php"> Saída de Equipamento </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" aria-current="page" href="quantidadestoque.php"> Quantidade em Estoque </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="listar.php"> Lista de Produtos </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="buscarapida.php"> Busca por Unidade </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="nf_table.php"> Nota Fiscal </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="index.php"> Sair </a>
        </li>     
    </ul>
		
    </div>
  </div>
</nav>

   
<div class="container">
<img src="img/campotvlogo.png" class="rounded mx-auto d-block" style="padding: 5%;">
  <div class="row align-items-center">
    <div class="col">
      <table> 
        <?php 
        session_start();
        include_once("conexao.php");
        
        $query = "SELECT count(id) AS total FROM post WHERE produto = 'Bematech'";
        $queryProdu = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($queryProdu);
            $num_rows = $row['total'];
            echo "<div class='table-primary'> Impressoras Cadastradas : " . $num_rows . "</div>";

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
  
    <?php 
    $qry = "SELECT count(id) AS total FROM post WHERE situacao = 'Estoque' and produto = 'Touch TM-15'";
    $qryProdu = mysqli_query($conn, $qry);

    $row_qry = mysqli_fetch_array($qryProdu);
        $num_rows = $row_qry['total'];
        echo " <div class='table-light'>  Touch TM-15 Estoque: " . $num_rows . "</div><br>";




    ?>
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

<?php /* 
 
# Total de Produtos Alugados.  
$qryTst = "SELECT * FROM post WHERE situacao = 'Aluguel' ";
$qryTeste = mysqli_query($conn, $qryTst);

echo  "Produtos Alugados : " . mysqli_num_rows($qryTeste) . "<br>";
    
*/ ?>



<?php 

# Query do total. 
/* $queryEstoque="SELECT * FROM post ORDER BY situacao";
$queryEsto = mysqli_query($conn, $queryEstoque);
$row_estoque = mysqli_num_rows($queryEsto);

# Query Total da situacao cadastrada menos o que se encontra em Estoque. 

$qryEst = "SELECT * FROM post WHERE situacao = 'Estoque' ";
$qryEstoque = mysqli_query($conn, $qryEst);
$row_est = mysqli_num_rows($qryEstoque);
$resultado = ($row_estoque - $row_est) ;
echo " Total Estoque :  " . $resultado . "<br>";

    */
?>


    </div>
        </div>
            </body>
                </html>
