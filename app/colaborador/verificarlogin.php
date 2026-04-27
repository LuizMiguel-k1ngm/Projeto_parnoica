<?php
session_start();
include_once '../_config/conn.php';

$login = mysqli_real_escape_string($con, $_POST["login"]);
$senha = $_POST["senha"]; 


$sql = "SELECT l.login, l.senha, l.idFuncionario, f.idCargo 
        FROM login AS l
        INNER JOIN funcionario AS f ON l.idFuncionario = f.idFuncionario
        WHERE l.login = '$login'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_array($result);
    
 //   if (password_verify($senha, $row["senha"])) {
 if (password_verify($senha, $row["senha"])) {
        
      
        $_SESSION["login"] = $row["login"];
        $_SESSION["idCargo"] = $row["idCargo"];
        $_SESSION["tempo"] = time();
        
        header("location:painel.php");
        exit();

    } else {

        $msg = "Senha incorreta!";
        header("location:../index.php?msg=" . urlencode($msg));
        exit();
    }
} else {
    
    $msg = "Usuário não encontrado!";
    header("location:../index.php?msg=" . urlencode($msg));
    exit();
}