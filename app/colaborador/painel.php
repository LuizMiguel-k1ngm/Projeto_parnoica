<?php

include_once'./validar.php';
?>

   

<!DOCTYPE html>
<html lang="pt-br">
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
            if($_SESSION["login"] == 'adm'){
                include_once 'menu_adm.php';
                
            }elseif($_SESSION["login"] == 'funcionario'){
                include_once 'menu_funcionario.php';          
            }
        ?>


    


    
</body>
</html>


