<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Código</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	* {
		font-family: Sans-serif ; 
		
	}
	
	body{
		background-image: linear-gradient(to right,silver,green);	
	}
	
	
	</style>
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
          <a class="nav-link active" style="padding: 15px;" aria-current="page" href="quantidadestoque.php"> Quantidade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="listar.php"> Lista de Produtos </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="buscarapida.php"> Busca Rapida </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="barcodeindex.php"> Gerador de Código </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="form.php"> Cadastrar Produto </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" style="padding: 15px;" href="index.php">Sair</a>
        </li>     
    </ul>
		
    </div>
  </div>
</nav>

<div class="container">
  	<form class="form-horizontal" method="post" action="barcode.php" target="_blank" style="margin-top: 90px;">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="product"></label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="hidden" class="form-control" id="product" name="product">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Código de Barras</label>
      <div class="col-sm-12">
        <input autocomplete="OFF" type="text" class="form-control" id="product_id" name="product_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rate"></label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="hidden" class="form-control" id="rate"  name="rate">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="print_qty">Quantidade</label>
      <div class="col-sm-12">          
        <input autocomplete="OFF" type="text" class="form-control" id="print_qty"  name="print_qty" value="1" readonly="true">
      </div>
    </div>

    <div class="form-group">        
        <div class="col-3 mx-auto">
        <b><button type="submit" class="btn" style="height: 45px; width: 200px;">Gerar</button></b>
        </div>
    </div>
   </form>
  </div>
</div>

</body>
</html>
