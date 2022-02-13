<?php 

session_start(); // inicia a sessão da mensagem de cadastro
include_once("conexao.php");
include('navbar.html');

?>

<!DOCTYPE html>
<html lang ="PT-BR">
<head>
	<title>Formulario</title>	
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
		<div class="container">
			<button style="margin-top: 5px;" class="btn">
			<a style="text-decoration: none; color: black;" href="insert_produto.php">
			Cadastrar Produto
			</button>
			</a> 
		</div>
<div class="container" style="margin-top: 1px;"> 
	<form method="POST" action="processo.php">
			<input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código de Barras" autocomplete = 'OFF' required>  
			<br>
			
			<input type="text" name="etiqueta" id="etiqueta" class="form-control" placeholder="Número da Etiqueta" required>
			<br>	
			
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
			<br>
			
			<select name="id_sub_categoria" id="id_sub_categoria" class="form-control" required>
			<option value=""> Unidade </option>		
			</select>
			<br>
			
			<select name="situacao" id="situacao" class="form-control" required>
			<option value=""> Situação </option>
			<?php  
				$result_cat = "SELECT * FROM situacao ORDER by nome_situacao";
				$resultado_cat = mysqli_query($conn, $result_cat);
				while ($row_cat = mysqli_fetch_assoc($resultado_cat)){
				echo '<option value="' . $row_cat['nome_situacao'] . '">' .$row_cat['nome_situacao'] . '</option>'; 
			}
			?>
			</select>
			<br>
			
			<select name="id_produto" id="id_produto" class="form-control" required>
			<option value=""> Produto </option>
			<?php  
				$result_cat = "SELECT * FROM produto_select ORDER by nome_produto";
				$resultado_cat = mysqli_query($conn, $result_cat);
				while ($row_cat = mysqli_fetch_assoc($resultado_cat)) {				
				echo '<option value="' . $row_cat['nome_produto'] . '">' . $row_cat['nome_produto'] . '</option>'; 
			}
			?>
			</select>
			<br>
			
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
			<!-- Botões -->
			<div class="col-6 mx-auto" style="margin-top: 5px;">
				<button class="btn" style="width: 250px;" type="reset">Limpar</button>
				<button class="btn" style="width: 250px;" type="submit" name="cadastrar">Cadastrar</button>
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