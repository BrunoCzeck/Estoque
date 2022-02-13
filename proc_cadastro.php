<?php  
include_once("conexao.php");
session_start();
if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo']['name'];
    $formatos = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION)); 
    $numero_nf = $_POST['numero_nf'];
    $new_name = md5(time()) . "." . $formatos; 
    $diretorio = "upload/"; 
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $new_name);
    $sql = "INSERT INTO cadastro_nf (numero_nf ,nome_arquivo, created) VALUES ('$numero_nf' ,'$new_name', NOW())";
    $sql_result = mysqli_query($conn, $sql);
    /* Verificação de cadastro */
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Nota Cadastrada!</p>";
        header("Location: nf_table.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Nota Não Cadastrada!</p>";
        header("Location: nf_cadastro.php");
    }
}
?>
