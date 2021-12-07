<?php 
//    Validar
session_start();
include_once("conexao.php");

if ((isset($_POST['login'])) && (isset($_POST['senha']))) {
    // -- Injection -- 
    $user = mysqli_real_escape_string($conn, $_POST['login']); 
    $senha = mysqli_real_escape_string($conn, $_POST['senha']); 
    // $senha = md5($senha); //md5 usado para criptografar  

    if (($senha == "cwb123") && ($user == "estoquecwb")){
        header("Location:form.php");


    }else{
    $_SESSION['loginError'] = "Usuário ou Senha Invalido!";
    header("Location:login.php");
    
    }
}  
?>