<?php

session_start(); // inicia a sessão da mensagem de cadastro
include("conexao.php");
include('navbar.html');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$id = $_GET['id'];
$result_produto = "SELECT * FROM post WHERE id = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

$empresa = $row_produto['empresa'];

$sql = "SELECT * FROM empresas ORDER BY empresa";
$resultado_empresa = mysqli_query($conn, $sql);

$situacao = $row_produto['situacao'];

$sqlSitu = "SELECT * FROM situacao ORDER BY nome_situacao";
$result_situacao = mysqli_query($conn, $sqlSitu);

$produto =  $row_produto['produto'];

$sqlProdu = "SELECT * FROM produto_select ORDER BY nome_produto";
$result_produ = mysqli_query($conn, $sqlProdu);

$sub_categorias_post_id = $row_produto['sub_categorias_post_id'];

$sqlSub = "SELECT * FROM sub_categorias_post ORDER BY id";
$result_sub = mysqli_query($conn, $sqlSub);

$nome_categoria = $row_produto['nome_categoria'];

$sqlOrg = "SELECT * FROM categorias_post ORDER BY nome_categoria";
$result_org = mysqli_query($conn, $sqlOrg);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>Editar</title>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>
	<div class="container">
		<div class="col">
			<form method="POST" action="proc_edit_produto.php" style="margin-top: 15px;">
				<input type="hidden" class="form-group" name="id" value="<?php echo $row_produto['id'] ?>">
	
				<div class="form-group">
					<label for="codigo"> Código de Barra </label>
					<input class="form-control" type="text" name="codigo" value="<?php echo $row_produto['codigo'] ?>" readonly="true">
				</div>
				
				<div class="form-group">
					<label for="etiqueta"> Etiqueta </label>
					<input class="form-control" type="text" name="etiqueta" value="<?php echo $row_produto['etiqueta'] ?>" readonly="true">
				</div>
		
				<div class="form-group">
					<label> Unidade </label>
					<select class="form-control" name="selSub">
						<?php
						echo "<option value='$sub_categorias_post_id'>$sub_categorias_post_id</option>";
						echo "<option value=''>------------------- </option>";
						while ($row_sub = mysqli_fetch_array($result_sub)) {
							$sub_categorias_post_id = $row_sub['nome_sub_categoria'];
							echo "<option value='$sub_categorias_post_id'>$sub_categorias_post_id</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label> Produto </label>
					<select class="form-control" name="selProduto">
						<?php
						echo "<option value='$produto'>$produto</option>";
						echo "<option value=''>------------------- </option>";
						while ($row_produ = mysqli_fetch_array($result_produ)) {
							$produto = $row_produ['nome_produto'];
							echo "<option value='$produto'>$produto</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label> Situação </label>
					<select class="form-control" name="selSituacao">
						<?php
						echo "<option value='$situacao'>$situacao</option>";
						echo "<option value=''>------------------- </option>";
						while ($row_situacao = mysqli_fetch_array($result_situacao)) {
							$situacao = $row_situacao['nome_situacao'];
							echo "<option value='$situacao'>$situacao</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Empresa</label>
					<select class="form-control" name="selEmpresa">
						<?php
						echo "<option value='$empresa'>$empresa</option>";
						echo "<option value=''>------------------- </option>";
						while ($row_empresa = mysqli_fetch_array($resultado_empresa)) {
							$empresa = $row_empresa['empresa'];
							echo "<option value='$empresa'>$empresa</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group" style="text-align:center;">
					<button 
					type="submit" class="btn" style="height: 50px; width: 220px;">Editar
					</button>
				</div>
					</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	</form>
</body>
</html>