	<head>
  <style>
	* {
		font-family: Sans-serif ; 
		
	}
	
	body{

		background-image: linear-gradient(to right,#C1CDC1, #32CD32);	
		
	}
	
	
	</style>
		<title>Busca Rapida</title>	
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

	<form method="POST" action="proc_buscar_rapido.php" style="margin-top: 220px;">
		<div class="container">
			<input class="form-control" type="text" name="pesquisar" placeholder="Unidade"></input>
			<br>
			<div class="col-3 mx-auto">
				<button class="btn" style="width: 150px;" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>
<body>