<?php 
session_start(); // Aviso se cadastrou
include_once ("conexao.php");

$id = filter_input(INPUT_POST, 'id',  FILTER_SANITIZE_NUMBER_INT);
$etiqueta = $_POST['etiqueta'];
$codigo = $_POST['codigo'];
$produto = $_POST['selProduto'];
$situacao = $_POST['selSituacao'];
$empresa = $_POST['selEmpresa'];
$nome_categoria = $_POST['selOrg'];
$sub_categorias_post_id = $_POST['selSub'];

//$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
//$produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);

//echo "Produto: $produto <br>";
//echo "Quantidade: $quantidade <br>";


$result_produto = "UPDATE post SET etiqueta='$etiqueta', codigo='$codigo', produto='$produto', situacao='$situacao', 
empresa='$empresa', nome_categoria='$nome_categoria', 
sub_categorias_post_id='$sub_categorias_post_id', modified=NOW() WHERE id='$id'";
$resultado_produto = mysqli_query($conn, $result_produto);



// Cadastra e redireciona. 
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto Editado com Sucesso!</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto Não Editado!</p>";
	header("Location: editar.php?id= . $id .");
}

?>