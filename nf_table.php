<?php 
include_once("conexao.php");

?> 

<!DOCTYPE html>
<html lang ="PT-BR">

<head>
  <style>
	* {
		font-family: Sans-serif ; 
		
	}
	
	body{
		background-image: linear-gradient(to right,#C1CDC1, #32CD32);
	}
	
	
	</style>
		<title>Busca Rapida</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
		
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


<form class="d-flex" method="POST" action="nf_pesquisa.php" style="margin-top: 45px; margin-left:2%;"> 
        <input class="form-control me-2" style="width: 300px; height: 35px;" name="pesquisar" placeholder="Número da NF" >
        
		<button class="btn" type="submit" style="margin-left: 5px; height: 35px;">Pesquisar</button>
		
		<button style= "margin-left: 35%;" style="width: 300px; height: 35px;" class="btn" type="button"><a style="text-decoration: none; color: black;" href="nf_cadastro.php"> Cadastrar Nota Fiscal</a></button>

</form>


<div class="container-fluid">
<table class="table" style="margin-top: 15px;">
	
	<thead>
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Número NF</th>
		<th scope="col">Nome Arquivo</th>
		<th scope="col">Cadastrado</th>		  
	</tr>
	</thead>
		 

	<?php  
	$sql = "SELECT * FROM cadastro_nf ORDER BY created";
	$sql_result = mysqli_query($conn, $sql);
		while($row_sql = mysqli_fetch_array($sql_result)):
	?>
<tbody>
	<tr>
		<td><?php echo $row_sql['id'];?></td>
		<td><?php echo $row_sql['numero_nf'];?></td>
		<td><?php echo $row_sql['nome_arquivo'];?></td>
		<td><?php echo $row_sql['created'];?></td>
		<td><?php echo "<button class='btn' style='background: silver;' ><a style='text-decoration: none; color: black;' href='upload/" . $row_sql['nome_arquivo'] . "'> Visualizar </a></button>";?></td>
	</tr>
</tbody>
	<?php
		endwhile;
	?>
	</table>
</div>