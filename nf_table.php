<?php 
include_once("conexao.php");
include('navbar.html');

?> 

<!DOCTYPE html>
<html lang ="PT-BR">
	<head>
		<title>Busca Rapida</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
		<script src="js/bootstrap.bundle.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>	
	<body>
	<form class="d-flex" method="POST" action="nf_pesquisa.php" style="margin-top: 45px; margin-left:2%;"> 
		<input class="form-control me-2" style="width: 300px; height: 35px;" name="pesquisar" placeholder="Número da NF">
		<button class="btn" type="submit" style="margin-left: 5px; height: 35px;">
			Pesquisar
		</button>
		<button style= "margin-left: 35%;" style="width: 300px; height: 35px;" class="btn" type="button">
		<a style="text-decoration: none; color: black;" href="nf_cadastro.php">
			Cadastrar Nota Fiscal
		</a>
		</button>
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
			while($row_sql = mysqli_fetch_array($sql_result)){
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
			}
		?>
	</table>
	</div>
	</body>
</html>