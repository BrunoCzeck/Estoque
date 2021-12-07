<?php 

session_start(); // inicia a sessão da mensagem de cadastro
include_once("conexao.php");

	//<button><a href="buscar.php"> Buscar Produto </a></button>


/* 	<div class="row">

	<div class="col">
		<button type="button" class="btn" style="width: 190px; height: 50px;"><a href="quantidadestoque.php" style="color:black; text-decoration:none;"><i class="far fas fa-cubes"> Quantidade Estoque </i></a></button>
	</div>
			
	<div class="col">
		<button type="button" class="btn" style="width: 190px; height: 50px;"><a href="listar.php" style="color:black; text-decoration:none;" ><i class="far fas fa-list"> Listar Produtos </i></a></button>
	</div>

	<div class="col">

		<button type="button" class="btn" style="width: 190px; height: 50px;"><a href="buscarapida.php" style="color:black; text-decoration:none;"><i class="fas fa-search"> Buscar Rapido </i></a></button>
	</div>
	<div class="col">
		<button type="button" class="btn" style="width: 190px; height: 50px;"><a href="barcodeindex.php" style="color:black; text-decoration:none;"><i class="fas fa-barcode"> Gerador de Código </i></a></button>
	</div>

	<div class="col">
		<button type="button" class="btn" style="width: 190px; height: 50px;"><a href="index.php" style="color:black; text-decoration:none;"><i class="fas fa-sign-in-alt"> Sair </i></a></button>
	</div>
		</div> */ 
		

# Teste de Menus Responsivos #
/* 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img src="img/campotvlogo.png" class="rounded mx-auto d-block">
	<div class=container>
			<ul class="navbar-nav mr-auto" id="navbarNavDropdown">
				<li class="nav-item" style="padding: 10px;">
					<a class="nav-link" href="quantidadestoque.php"> Quantidade <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" style="padding: 10px;">
					<a class="nav-link" href="listar.php"> Lista de Produtos <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" style="padding: 10px;">
					<a class="nav-link" href=""> Busca Rapida <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" style="padding: 10px;">
					<a class="nav-link" href="#"> Gerador de Código <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" style="padding: 10px;">
					<a class="nav-link" href="#"> Sair <span class="sr-only">(current)</span></a>
				</li>
				</ul>
				<form class="d-flex" method="POST" action="proc_buscar_rapido.php">
					<input class="form-control me-2" type="search" placeholder="Procurar" name="pesquisar" aria-label="Search">
					<button class="btn btn-outline-success" type="submit" value="">Pesquisar</button>
				</form>
			
		</div>
	</div>
</nav>

*/



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
		<title>Formulario</title>	
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
	<button style="margin-top: -50px; margin-left: 90%;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
		
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
			
		?>
				<div class="container">
				<button style=" margin-top: 5px;" class="btn"><a style="text-decoration: none; color: black;" href="insert_produto.php">  Cadastrar Produto </button></a> 
				</div>
				<div class="container" style="margin-top: 20px;"> 
				
		
				<form method="POST" action="processo.php">
				
				
				  <!--  <label for="codigo"> Codigo:</label> -->
				<input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código de Barras" autocomplete = 'OFF' required>  
				<br>

				<input type="text" name="etiqueta" id="etiqueta" class="form-control" placeholder="Número da Etiqueta" required> 
				
				<br>
				<?php			# Select Dinamico #				  ?> 		
				<select name="id_categoria" id="id_categoria" class="form-control" required>
		
				<option value="">Organização</option>
		<?php  
		
				$result_cat = "SELECT * FROM categorias_post ORDER by nome_categoria";
				$resultado_cat = mysqli_query($conn, $result_cat);
				while ($row_cat = mysqli_fetch_assoc($resultado_cat)) {
				echo '<option value="' . $row_cat['id'] . '">' .$row_cat['nome_categoria'] . '</option>'; 
				}
		?>
				</select>
				
				<!-- <label> Unidade </label> -->
				<br>
				<select name="id_sub_categoria" id="id_sub_categoria" class="form-control" required>
				<option value=""> Unidade </option>
						
						
				</select><br>

				<?php			# Final do Select dinamico #				  ?> 


			<select name="situacao" id="situacao" class="form-control" required>
				<option value=""> Situação </option>
				<?php  
				$result_cat = "SELECT * FROM situacao ORDER by nome_situacao";
				$resultado_cat = mysqli_query($conn, $result_cat);
				while ($row_cat = mysqli_fetch_assoc($resultado_cat)){
				echo '<option value="' . $row_cat['nome_situacao'] . '">' .$row_cat['nome_situacao'] . '</option>'; 
				}
				?>
			</select><br>
				
		
				<select name="id_produto" id="id_produto" class="form-control" required>
				<option value=""> Produto </option>
				
		<?php  

					$result_cat = "SELECT * FROM produto_select ORDER by nome_produto";
					$resultado_cat = mysqli_query($conn, $result_cat);
					while ($row_cat = mysqli_fetch_assoc($resultado_cat)) {				
						echo '<option value="' . $row_cat['nome_produto'] . '">' . $row_cat['nome_produto'] . '</option>'; 
					} 
		
		?>
				</select><br>


				<select name="empresa" id="empresa" class="form-control" required>
				<option value=""> Empresa </option>			
					
				
		<?php
					$result_cat = "SELECT * FROM empresas ORDER by empresa";
					$resultado_cat = mysqli_query($conn, $result_cat);
					while ($row_cat = mysqli_fetch_assoc($resultado_cat)) {
					echo '<option value="' . $row_cat['empresa'] . '">' .$row_cat['empresa'] . '</option>'; 
					}
		?>
				
				</select>
			
					
				
				
		
	
	
				<div class="col-6 mx-auto" style="margin-top: 5px;">
					<button class="btn" style="background: #DCDCDC; width: 250px;" type="reset"> Limpar </button>
					
					<button class="btn" style="background: #DCDCDC; width: 250px;" type="submit" name="cadastrar"> Cadastrar</button>
				</div>

				</div>
				</form>
				
			
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				
				 <script type="text/javascript">
				 $(function(){
					$('#id_categoria').change(function(){
						if( $(this).val() ) {
							$('#id_sub_categoria').hide();
							$('.carregando').show();
							$.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
								var options = '<option value="">Escolha Subcategoria</option>';	
								for (var i = 0; i < j.length; i++) {
									options += '<option value="' + j[i].nome_sub_categoria + '">' + j[i].nome_sub_categoria + '</option>';
								
								}	
								$('#id_sub_categoria').html(options).show();
								$('.carregando').hide();
							});
						} else {
							$('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
						}
					});
				});
				
		</script>
	</body>
</html>