<?php
include_once '../cliente/cCliente.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Frigobar</title>
</head>

<body>
    <h3>Consulta cliente</h3>

    <form action="../frigobar/cFrigobar.php" method="get">
        CPF do cliente:
           <input type= "text" name="cpf" require="true" required pattern="[0-9]{11}" minlength="11" placeholder="00000000000" title="digite apenas os números do CPF">
        <input type="submit" value="Buscar">
    </form>




</body>

</html>