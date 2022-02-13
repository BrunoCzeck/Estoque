<?php 
include_once ("conexao.php");
include('navbar.html');
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
	<?php	
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		} 
	?>
	<div class="container-fluid"> 
		<form action="proc_cadastro.php" METHOD="post" enctype="multipart/form-data" style="margin-top:20px;"> 
			<input type="text" name="numero_nf" required placeholder="Código da Nota" style="margin-bottom:10px; width: 450px; height: 35px;" class="input-group-text">   
			<input  type="file" name="arquivo">
			<input  type="submit" name="cadastrar-formulario" style="width: 100px;">
		</form>
	</div>
	</body>
</html>