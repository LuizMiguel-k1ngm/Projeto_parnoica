<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Consulta colaborador</h3>

    <form action="../colaborador/cColaborador.php" method="get">

        Cargo: <br>
        <input type="radio" name="idCargo" value="1" required /> Administrador
        <input type="radio" name="idCargo" value="2" required /> Funcionario
        <br>
        <input type="submit" value="Buscar">
    </form>



</body>

</html>