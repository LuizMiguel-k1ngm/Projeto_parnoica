<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $idFrigobar = $_GET["idFrigobar"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.frigobar where idFrigobar = " . $idFrigobar;
    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($result);
    ?>

    <!-- editar/atualizar o frigobar -->
    <h3>Atualizar do frigobar</h3>

    <form action="../frigobar/aFrigobar.php" method="post">


        <input type="hidden" readonly="true" name="idFrigobar" value="<?php echo $row["idFrigobar"] ?>" />




        <?php echo 'Frigobar ' . $idFrigobar; ?> <br> <br>
              
        selecione o status<br />
        <input type="radio" name="fstatus" value="A" /> Ativo
        <input type="radio" name="fstatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Enviar" />



    </form>




</body>

</html>