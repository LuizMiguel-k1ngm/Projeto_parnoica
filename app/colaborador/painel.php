<?php

include_once './validar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    

    ?>

    <?php
    if ($_SESSION["login"] == 'adm') {
        echo "Seja bem vindo(a) " . $_SESSION["login"];
        include_once 'menu_adm.php';
    } elseif ($_SESSION["login"] == 'funcionario') {
        echo "Seja bem vindo(a) " . $_SESSION["login"];
        include_once 'menu_funcionario.php';
    }else{
        echo "Erro, usuario não cadastrado!";
        
    }
    ?>

</body>

</html>