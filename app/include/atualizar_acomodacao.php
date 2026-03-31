<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar acomodação</title>
</head>

<body>

 <?php

/*    $idAcomodacao = $_GET["idAcomodacao"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.acomodacao where idAcomodacao = " . $idAcomodacao;
    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($result);
    */?>




<h3>Atualizar do acomodação</h3>

    <form action="../acomodacao/aAcomodacao.php" method="post">


        <input type="hidden" readonly="true" name="idAcomodacao" value="<?php echo $row["idAcomodacao"] ?>" />


        <?php echo 'Frigobar ' . $idFrigobar; ?> <br> <br>
        
        selecione o status<br />
        <input type="radio" name="fstatus" value="A" /> Ativo
        <input type="radio" name="fstatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Enviar" />

    </form>

</body>

</html>