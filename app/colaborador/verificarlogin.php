<?php

session_start();
//session -> espaço de memória no BROWSER
$login = $_POST["login"];
$senha = $_POST["senha"];

//http://php.net/manual/pt_BR/function.mysql-real-escape-string.php

include_once '../_config/conn.php';

echo $sql = "select * from login where 
                login = '" . $login . "' AND senha = '" . $senha . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) >= 1) {
    //echo "logado";
    $row = mysqli_fetch_array($result);
    $_SESSION["login"] = $row["login"]; //guardando no navegador(sessao) o valor do login
    $_SESSION["idCargo"] = $row["idCargo"];
    $_SESSION["tempo"] = time();
    header("location:painel.php");
} else {
    $msg = "Login/Senha invalido(s)";
    header("location:../index.php?msg=" . $msg);
}

