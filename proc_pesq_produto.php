<?php

include_once("conexao.php");

$codigo =  filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
$result_pesquisa= "SELECT * FROM post WHERE codigo LIKE '%".$codigo."' LIMIT 1";
$resultado_pesquisa = mysqli_query($conn, $result_pesquisa);

if(($resultado_pesquisa) AND ($resultado_pesquisa->num_rows !=0)){
		while($row_pesquisa = mysqli_fetch_assoc($resultado_pesquisa)){
			echo "<li>".$row_pesquisa['codigo']."</li>";	
	}
}else{
		echo "Nenhum Resultado Encontrado!";
}	
?>