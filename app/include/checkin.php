<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Parnaioca</title>
</head>

<body>
    <h3>Check-in: hospedes</h3>

    <form action="checkin.php" method="GET">
        CPF: <br>
        <input type="text" name="cpf" required value="<?php echo $_GET['cpf'] ?? ''; ?>">

        <input type="submit" value="buscar">

    </form>

    <hr>
    <?php

    include '../reserva/cReserva.php';
    ?> <form action="" method="POST">

        <input type="hidden" name="idReserva" value="<?php echo $idReserva ?? ''; ?>">

        <input type="submit" name='rStatus' value='confirmar'>
        <input type="submit" name='rStatus' value='cancelar'>

    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../checkin/gCheckin.php';
    }
    ?>
    <br>
    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>



</body>

</html>