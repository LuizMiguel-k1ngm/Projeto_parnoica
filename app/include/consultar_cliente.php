<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Cliente</title>
</head>

<body>

    <form action="consultar_cliente.php" method="get">

        <h3>Consulta Clientes</h3>

        <input type="radio" name="cStatus" value="A" required /> Ativo
        <input type="radio" name="cStatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Buscar">


        <?php  include_once "../cliente/cCliente.php";
 ?>
      


    </form>

</body>

</html>