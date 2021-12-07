<head>
		<title>Formulario</title>
		
		<link href="css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
		<style> 


	* {
		font-family: Sans-serif ; 
		
	}
	
	body{
		background-image: linear-gradient(to right,#C1CDC1, #32CD32);
	}





		</style>	

</head>
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
          <a class="nav-link active" style="padding: 15px;" aria-current="page" href="quantidadestoque.php"> Quantidade em Estoque </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="listar.php"> Lista de Produtos </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="buscarapida.php"> Busca por Unidade </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="nf_cadastro.php"> Nota Fiscal </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="index.php"> Sair </a>
        </li>     
    </ul>
		</div>
  	</div>
</nav>
	
<?php

include_once("conexao.php");

	$pesquisar = $_POST['pesquisar'];
	$result_pesquisa = "SELECT * FROM post WHERE sub_categorias_post_id LIKE '%".$pesquisar."%' LIMIT 30";
	$resultado_pesquisa = mysqli_query($conn, $result_pesquisa);


?> 
 	
	 <form method="POST" action="gerar_relatorio.php" style="margin-top: 10px;">
		<button style="margin-left: 20px;" class="btn btn-secondary" type="submit">Relatorio Completo </button>
		



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
	<td><?php echo "<button class='btn' style='background: silver;' ><a style='text-decoration: none; color: black;' href='editar.php?id=" . $rows_pesquisa['id'] . "'> Editar </a></button>";?></td>

	
</tr>

<?php
	
	}

?>
</form>

	<!-- echo "Produto :".$rows_pesquisa['codigo']."<br>"; -->