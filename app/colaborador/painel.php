<?php
include_once'./validar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bem-vindo ao sistema</h1>

  <?php
        echo "Seja bem vindo(a) ".$_SESSION["login"];
 ?>

<!-- criar aqui o redirecionamento para adm e funcionario-->

   <?php
            if($_SESSION["perfil"] == "administrador"){
                include_once 'menu_adm.php';
            }elseif($_SESSION["perfil"] == "funcionario"){
                include_once 'reserva/gReserva.php';
            }
        ?>
        


    
</body>
</html>


