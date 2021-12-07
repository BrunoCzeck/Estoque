<?php 
header("content-type: text/html; charset=utf-8");
$servidor = "127.0.0.1:3306"; 
$usuario = "root";
$senha= "root.adm00";
$dbname = "estoque";

// Cria conexão com o BD

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$conn -> set_charset("utf8"); # seta tudo como utf8. # Mysql colocar toda as tabelas  em utf8_unicode_ci
?>