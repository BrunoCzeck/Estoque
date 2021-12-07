<?php 
include_once("conexao.php");
?>

<?php 
$id = $_GET['id'];

$sql = "SELECT * FROM cadastro_nf WHERE id='$id'";

$query = mysqli_query($conn, $sql);
$result_query = mysqli_fetch_assoc($query); 

?> 

<iframe style="width: 100%; height: 100%;" src="upload/"<?php echo $result_query['nome_arquivo']?>></iframe>