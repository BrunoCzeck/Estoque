<?php 

# Inserir Produto. 
include_once("conexao.php");

$nome_produto = $_POST['nome_produto'];
$sql = "INSERT INTO produto_select (nome_produto) VALUES ('$nome_produto')";
$sql_result = mysqli_query($conn, $sql); 

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto Registrado!</p>";
	header("Location: form.php");
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Produto Não Registrado!</p>";
	header("Location: insert_produto.php");
}
?> 