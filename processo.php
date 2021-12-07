<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<?php 
session_start(); // Aviso se cadastrou
include_once ("conexao.php");

//$produto = filter_input (INPUT_POST, 'id_produto', FILTER_SANITIZE_STRING);
//$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$produto = $_POST['id_produto'];
$id_categoria = $_POST['id_categoria'];
$sub_categoria = $_POST['id_sub_categoria'];
$situacao = $_POST['situacao'];
$empresa = $_POST['empresa'];
$codigo = $_POST['codigo'];
$etiqueta = $_POST['etiqueta'];

//echo "Produto: $produto <br>";
//echo "Quantidade: $quantidade <br>";
$result_quantidade = "INSERT INTO post (codigo, etiqueta, sub_categorias_post_id, produto, situacao, empresa, nome_categoria, created ) VALUES ('$codigo', '$etiqueta', '$sub_categoria', '$produto', '$situacao', '$empresa', '$id_categoria', NOW())";
$resultado_quantidade = mysqli_query($conn, $result_quantidade);
// Cadastra e redireciona. 
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto Cadastrado!</p>";
	header("Location: form.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto Não Cadastrado!</p>";
	header("Location: form.php");
}

?>