<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Frigobar</title>
</head>

<body>
    <h3>Consulta Frigobar</h3>

    <form action="consultar_frigobar.php" method="get">
        <br>
        Status: <br>
        <input type="radio" name="fstatus" value="A"/> Ativo
        <input type="radio" name="fstatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Buscar">

    </form>




    <hr>
    <?php
    include_once '../frigobar/cFrigobar.php';
    ?>
    <hr>


    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>




</body>

</html>