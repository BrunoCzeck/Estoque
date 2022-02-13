<?php 

session_start(); // inicia a sessão da mensagem de cadastro
include_once("conexao.php");
include('navbar.html');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM post WHERE id = '$id'";
$resultado_produtos = mysqli_query($conn, $result_produto);

?>

<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		</style>
			<title>Lista</title>	
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
			<script src="js/bootstrap.bundle.js"></script>
			<script src="js/bootstrap.js"></script>
	</head>	
<body>
<div class="container-fluid" style="margin-top: 15px;">
	<form class="form-inline" method="POST" action="saida_produto.php">
		<input class="form-control mr-3"  type="search" name="pesquisar" placeholder="Código de Barras" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background:silver; color: black;">Pesquisar</button>
    </form>
	<hr>	
</div>
</nav>
		
		

		
		<?php
		
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
			
			
		
		
		// Paginação 
		//Recebe a pg e o numero 
		$pagina_atual= filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1; 
		
		// setar a quantidade itens
		$qnt_result_pg = 3;
		
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg; 
		// Final da Paginação 
		
			
		?>	
		
	
	<?php 

		$result_produtos = "SELECT * FROM post LIMIT $inicio, $qnt_result_pg"; 
		$resultado_produtos = mysqli_query($conn, $result_produtos);
		while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){ 
			
		

			
				
			/* if($row_produtos['nome_categoria'] == '1')
						{
							echo "Organização : Dasa";
						}
						if($row_produtos['nome_categoria'] == '2')
						{
							echo "Organização : Sicredi";
						}
						if($row_produtos['nome_categoria'] == '3')
						{
							echo "Organização : Sicoob";
						}
						echo "<br>";
		
						*/ 
			
			if($row_produtos['nome_categoria'] == '1'):
				echo "Dasa" . "<br>";	
				if($row_produtos['nome_categoria'] == '2'):
					echo "Sicredi" . "<br>";	
					elseif($row_produtos['nome_categoria'] == '3'): 
						echo "Sicoob" . "<br>";
				endif; 
			endif; 
			echo "Etiqueta : " . $row_produtos['etiqueta'] . "<br>";
			echo "Codigo de Barra : " . $row_produtos['codigo'] . "<br>";	
			echo "Local : " . $row_produtos['sub_categorias_post_id'] . "<br>";
			echo "Produto : " . $row_produtos['produto'] . "<br>";
			echo "Situação : " . $row_produtos['situacao'] . "<br>";
			echo "Empresa : " . $row_produtos['empresa'] . "<br>"; 
	     	
		?>


		
		<?php 
	
		echo "<button class='btn btn-primary' style='margin-top: 10px;'><b><a style='text-decoration: none; color: white;' href='editar.php?id=" . $row_produtos['id'] . "'> Editar </button></a></b>";		
		echo "\t";
		echo "<button class='btn btn-danger' style='margin-top: 10px;'><b><a style='text-decoration: none; color: white;' href='apagar_produto.php?id=" . $row_produtos['id'] . "'>	Apagar </button></a></b><br><hr>";
		
	}

		?> 

	

	<?php 

		$result_pg = "SELECT COUNT(id) AS num_result FROM post";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['numresult'];    // Quantidade de pagina
		
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		$max_links = 2;

		echo '<nav aria-label="paginacao">';
		echo '<ul class="pagination">';
		echo '<li class="page-item">';
	  	echo "<span class='page-link'><a href='listar.php?pagina=1'> Primeira </a> </span>";
		echo '</li>';
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){

			if ($pag_ant >= 1){
				echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=$pag_ant'> $pag_ant </a></li>";
			}

		}
	
		echo '<li class="page-item active">';
		echo '<span class="page-link">'; 
		echo "$pagina";
		echo '</span>';
		echo '</li>';
		
					
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				// so pode imprimir a quantidade de paginas que existe 
			 echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=$pag_dep'> $pag_dep </a></li>";

			 
			}
	}	
		
		echo '<li class="page-item">';
	  	echo "<span class='page-link'><a href='listar.php?pagina=$quantidade_pg'> Ultima </a> </span>";
		echo '</li>';
		echo '</ul>';
		echo '</nav>';
	
	?> 
	</body>
</html> 