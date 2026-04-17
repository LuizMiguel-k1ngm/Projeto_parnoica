<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Check-in: hospedes</h3>

    <form action="checkin.php">
        CPF: <br>
        <input type="text" name="cpf" required>
        <br>
        <br>
        <input type="submit" value="Buscar">
    </form>

    <hr>
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


</body>

</html>