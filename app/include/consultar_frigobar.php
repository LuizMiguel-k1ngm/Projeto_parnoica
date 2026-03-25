<?php
include_once '../frigobar/cFrigobar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Frigobar</title>
</head>

<body>
    <h3>Consulta Frigobar</h3>

    <form action="../frigobar/cFrigobar.php" method="get">
        Id do frigobar:
        <input type="number" step="1" patter="/d" min="1" name="idFrigobar" required>
        <input type="submit" value="Buscar">
    </form>




</body>

</html>