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
    <h1>Painel do sistema</h1>

  <?php
        echo "Seja bem vindo(a) ".$_SESSION["login"];
 ?>

<!-- criar aqui o redirecionamento para adm e funcionario-->
<!-- ver como redirecionar-->
<h4>Menu</h4>

   <?php
            if($_SESSION["idCargo"] == 1){
                include_once 'menu_adm.php';
                header('Location: menu_adm.php');
            }elseif($_SESSION["idCargo"] == 2){
                include_once '../reserva/gReserva.php';
                header('Location: gReserva.php');
            }
        ?>
        


    
</body>
</html>


