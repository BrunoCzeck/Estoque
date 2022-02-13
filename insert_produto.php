<?php 

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
  <div class="container-fluid"> 
    <form class="d-flex" style="margin-top: 40px;" method="POST" action="proc_nome_produto.php">
      <input style="width: 250px;" class="form-control" name="nome_produto" placeholder="Nome do Produto">
      <button class="btn" type="submit">Cadastrar</button>
    </form>
  </div>
  </body>
</html>