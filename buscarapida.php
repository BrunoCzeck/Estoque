<?php 
include('navbar.html');
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/bootstrap.js"></script>
	<title>Busca Rapida</title>
</head>	
<body>
	<form method="POST" action="proc_buscar_rapido.php" style="margin-top: 220px;">
			<div class="container">
				<input class="form-control" type="text" name="pesquisar" placeholder="Unidade">
				<div class="col-3 mx-auto">
				<button class="btn" style="width: 150px; margin-top: 20px;" type="submit">
				Pesquisar
				</button>
				</div>
			</div>
	</form>
<body>
</html>