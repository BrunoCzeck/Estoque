<?php 
include('navbar.html');
include_once("conexao.php");
$pesquisar = $_POST['pesquisar'];
$result_pesquisa = "SELECT * FROM post WHERE sub_categorias_post_id LIKE '%".$pesquisar."%' LIMIT 30";
$resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Formulario</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>		
		<script src="js/bootstrap.bundle.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<form method="POST" action="gerar_relatorio.php" style="margin-top: 10px;">
			<button style="margin-left: 20px;" class="btn btn-secondary" type="submit">
				Relatorio Completo
			</button>
		<table class="table" style="margin-top: 15px;">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Código de Barra</th>
					<th scope="col">Etiqueta</th>
					<th scope="col">Unidade</th>
					<th scope="col">Produto</th>
					<th scope="col">Situação</th>
					<th scope="col">Empresa</th>
				</tr>
			</thead>
			<tbody>	
			<?php
			while($rows_pesquisa = mysqli_fetch_array($resultado_pesquisa)){
			?>
			<?php $id = $rows_pesquisa["id"];?>
			<?php echo "<input type='hidden' name='pesquisa[$id] value='1'>" ?> 
				<tr>
					<td><?php echo $rows_pesquisa['id'];?></td>
					<td><?php echo $rows_pesquisa['codigo'];?></td>
					<td><?php echo $rows_pesquisa['etiqueta'];?></td>
					<td><?php echo $rows_pesquisa['sub_categorias_post_id'];?></td>
					<td><?php echo $rows_pesquisa['produto'];?></td>
					<td><?php echo $rows_pesquisa['situacao'];?></td>
					<td><?php echo $rows_pesquisa['empresa'];?></td>
					<td><?php echo "<button class='btn' style='background: silver;' >
					<a style='text-decoration: none; color: black;' href='editar.php?id=" . $rows_pesquisa['id'] . "'> Editar </a></button>";?></td>
				</tr>
			<?php	
			}
			?>
		</form>
	</body>
</html>