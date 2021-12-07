<?php 
/* Login */ 
include_once("conexao.php");


?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
   
    <title>Login</title>

</head>
<body style="background-image: linear-gradient(silver, green);">
        
<div class="container">
  <div style="margin: 40%; margin-top:85px;">
        <form method="POST" class="form-horizontal" action="validar.php">
        <div><img src="img/campotvlogo.png" style="margin-left: 30%;"></div>
        <div class="form-group">
        <label class="control-label col-sm-2"></label>
        <div class="col-sm-10">
        <input style="height: 50px; width: 200px;" class="form-control" type="text" name="login" id="login" placeholder="Usuário" required></input>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2"></label>
        <div class="col-sm-10"> 
        <input class= "form-control" style="height: 50px; width: 200px;"  type="password" name="senha" id="senha" placeholder="Senha" required></input>
        </div>
        </div>
        <div class="form-group">
        <button class="btn btn-success btn-lg btn-block" class="form-control" style="color: white; font-weight: bolder; height: 50px; width: 200px; margin-left: 6%;" type="submit">Acessar</button>
        </div>
        </div>
        </div>
        </div>
        </div>
        
         </form>
         <p class="text-center text danger">
         

         <?php 
         
         if(isset($_SESSION['loginError'])) {
             echo $_SESSION['loginError'];
             unset ($_SESSION['loginError']);
         } 
        
        
        ?>

         </p>
       </div>
    </body>
</html>