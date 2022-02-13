<?php 
include_once("conexao.php"); 
include('navbar.html'); 

$pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM cadastro_nf WHERE numero_nf LIKE '%".$pesquisar."' LIMIT 1";
$sql_saida = mysqli_query($conn, $sql);
$row_sql = mysqli_num_rows($sql_saida);

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
			$sql_result = mysqli_query($conn, $sql);
			while($row_sql = mysqli_fetch_array($sql_result)){
			?>
			<tr>
				<td><?php echo $row_sql['id'];?></td>
				<td><?php echo $row_sql['numero_nf'];?></td>
				<td><?php echo $row_sql['nome_arquivo'];?></td>
				<td><?php echo $row_sql['created'];?></td>
				<td><?php echo 
				"<button class='btn' style='background: silver;' >
				<a style='text-decoration: none; color: black;' href='upload/" . $row_sql['nome_arquivo'] . "'>
				Visualizar
				</a></button>";?></td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
	</body>
</html>
