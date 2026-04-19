<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Parnaioca</title>
</head>

<body>
    <h3>Check-in: hospedes</h3>

<<<<<<< HEAD
    <form action="checkin.php" method="GET">
        CPF: <br>
        <input type="text" name="cpf" required value="<?php echo $_GET['cpf'] ?? ''; ?>">
=======
    <form action="checkin.php">
        CPF: <br>
        <input type="text" name="cpf" required>
>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4
        <br>
        <br>
        <input type="submit" value="Buscar">
    </form>

    <hr>
<<<<<<< HEAD

    <?php
    // consultar a reserva
    // IMPORTANTE: O arquivo cReserva.php deve criar a variável $idReserva
    include '../reserva/cReserva.php';
    ?>

    <form action="" method="POST">

        <input type="hidden" name="idReserva" value="<?php echo $idReserva ?? ''; ?>">

        <input type="submit" name='rStatus' value='confirmar'>
        <input type="submit" name='rStatus' value='cancelar'>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../checkin/gCheckin.php';
    }
    ?>
=======
    <?php
    //consultar a reserva
    include '../reserva/cReserva.php';


    ?>

    <form action="status">
        <input type="button" name='cStatus' , value='confirmar' required>
        <input type="button" name='cStatus' value='cancelar'>
    </form>
<!-- 
    <?php
    //  include '../checkin/gCheckin.php';

    ?> -->

>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4

</body>

</html>