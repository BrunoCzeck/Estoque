<?php 

session_start();
include_once("conexao.php");
include('navbar.html');
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM post WHERE id = '$id'";
$resultado_produtos = mysqli_query($conn, $result_produto);

?>

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
<div class="container">
	<form method="POST" action="saida_produto.php" style="margin-top: 220px;">
		<input class="form-control" name="pesquisar" placeholder="Código de Barras">
		<div class="col-3 mx-auto">
		<button type="submit" class="btn" style="width: 150px; margin-top: 20px;">
		Pesquisar
		</button>
		</div>
</div>
	</form>
</body>
