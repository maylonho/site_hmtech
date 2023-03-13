<?php
include("../../php/conexao.php");
session_start();

$usuario = mysqli_real_escape_string($conexao ,trim($_POST['login']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

$sql = "SELECT COUNT(email_empresa) FROM empresa WHERE email_empresa='$usuario' AND senha_empresa='$senha'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);




if($row['COUNT(email_empresa)'] == 1){
    $_SESSION['usuario_logado'] = $usuario;
    header('Location:../pages/home.php');
}else{
    $_SESSION['usuario_invalido'] = true;
    header('Location:../pages/login.php');
}

?>