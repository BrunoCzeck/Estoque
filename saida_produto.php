<?php 
session_start();
include("conexao.php");


	$pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM post WHERE codigo LIKE '%".$pesquisar."' LIMIT 1";
	$sql_saida = mysqli_query($conn, $sql);
	$row_sql = mysqli_num_rows($sql_saida);


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
//$id = $_GET['id'];
$result_produto = "SELECT * FROM post WHERE id = '$id'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

$sqlEmpresa = "SELECT * FROM empresas ORDER BY empresa";
$resultado_empresa = mysqli_query($conn, $sqlEmpresa);

$sqlSitu = "SELECT * FROM situacao ORDER BY nome_situacao";
$result_situacao = mysqli_query($conn, $sqlSitu);

$sqlOrg = "SELECT * FROM categorias_post ORDER BY nome_categoria";
$result_org = mysqli_query($conn, $sqlOrg);

$sqlProdu = "SELECT * FROM produto_select ORDER BY nome_produto";
$result_produ = mysqli_query($conn, $sqlProdu);


$sqlSub = "SELECT * FROM sub_categorias_post ORDER BY id";
$result_sub = mysqli_query($conn, $sqlSub);





	if($row_sql > 0){
	

		while ($row_leitura = mysqli_fetch_array($sql_saida)){
   		$id = $row_leitura['id'];
		$codigo = $row_leitura['codigo'];
		$organizacao = $row_leitura['nome_categoria'];
		$sub_categorias_post_id = $row_leitura['sub_categorias_post_id'];
		$produto = $row_leitura['produto'];
		$situacao = $row_leitura['situacao'];
		$empresa = $row_leitura['empresa'];
		$etiqueta = $row_leitura['etiqueta'];
			
					 
		}
	}else{
		echo "<p style='color:red;'>Produto Não Cadastrado!</p>"; 		
		
	}


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
	<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>	-->
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
  <div class="container-fluid">
  <a href="form.php">
<img src="img/campotvlogo.png" class="rounded mx-auto d-block">
  </a>
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
	
	
		<?php

		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

		?>
	
		
			<div class="container">
				<div class="col">
				<form method="POST" action="proc_edit_saida.php" style="margin-top: 15px;">
				
					
				<div class="form-group">
					
					<input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" readonly="true">
					</div>
					
					<div class="form-group">
					<label for="codigo"> Código de Barra </label>


					<input class="form-control" type="text" name="codigo" value="<?php echo $codigo; ?>" readonly>
					</div>

					<div class="form-group">
					<label for="etiqueta"> Etiqueta </label>
					<input class="form-control" type="text" name="etiqueta" value="<?php echo $etiqueta; ?>" readonly>
					</div>
					
					<!-- <label> Organização : </label>		 
		<select name="selOrg">

			<//?php
		 	echo "<option value='$nome_categoria'>$nome_categoria</option>";
			echo "<option value=''>------------------- </option>";
			while ($row_org = mysqli_fetch_array($result_org)) {
				$nome_categoria = $row_org['nome_categoria'];
				echo "<option value='$nome_categoria'>$nome_categoria</option>";
			}
			?>

		</select>
		<br>

		-->



<!-- 
					<//?php  

				$result_cat_post = "SELECT * FROM categorias_post ORDER by nome_categoria";
				$resultado_cat_post = mysqli_query($conn, $result_cat_post);
				while ($row_cat_post = mysqli_fetch_assoc($resultado_cat_post)) {
				echo '<option value="' . $row_cat_post['id'] . '">' .$row_cat_post['nome_categoria'] . '</option>'; 
				}
		
					?>
-->
					
		
				<div class="form-group">
					<label> Unidade </label>
					<select class="form-control" name="selSub">
						
						<?php
						echo "<option value='$sub_categorias_post_id'>$sub_categorias_post_id</option>";
						echo "<option value=''> __________________________</option>";
						while ($row_sub = mysqli_fetch_array($result_sub)) {
							$sub_categorias_post_id = $row_sub['nome_sub_categoria'];
							echo "<option value='$sub_categorias_post_id'>$sub_categorias_post_id</option>";
						}
						?> 

					</select>
				</div>	

					<!--<label for="local"> Unidade | Agência: </label>
		<input type="text" name="local" value="<//?php echo $row_leitura['sub_categorias_post_id'] ?>">
		<br> -->
						
				<div class="form-group">
					<label> Produto  </label>
					<select class="form-control"name="selProduto">

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
				
					<!-- <label for="produto"> Produto: </label>
		<input type="text" name="produto" value="<//?php echo $row_leitura['produto'] ?>"> -->

					<!--  <label for="situacao"> Situação: </label>
				  <input type="text" name="situacao" value="<//?php echo $row_leitura['situacao']?>"> 
				  <br> -->
				  <div class="form-group">
					<label> Situação </label>
					<select class="form-control"name="selSituacao">

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
					<!--<label for="empresa"> Empresa: </label>
				  <input type="text" name="empresa" value="<//?php echo $row_leitura['empresa']?>"> 
				  -->
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
					<button type="submit" class="btn" style="height: 50px; width: 220px;">Editar</button>
				  </div>
				</div>
					
				</div>
				
						
			
						
					<script type="text/javascript" src="js/jquery.js"></script>
					<script type="text/javascript" src="https://www.google.com/jsapi"></script>
					
			</form>		
		</body>
	</html>


