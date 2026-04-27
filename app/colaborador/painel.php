<?php
include_once './validar.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel Login</title>
</head>

<body>

    <?php  $_SESSION["login"]; ?>

    <?php 
   
    if ($_SESSION["idCargo"] == 1) {
        include_once 'menu_adm.php';
    } 
    elseif ($_SESSION["idCargo"] == 2) {

        include_once 'menu_funcionario.php';
    } 
    else {
        echo "Erro: Login não encontrado.";
    }
    ?>

</body>

</html>