
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta estacionamento</title>
</head>
<body>
    <h1>consulta estacionamento</h1>
    <form action="consultar_estacionamento.php" method="get">
        N° da vaga:
        <input type="number" step="1" patter="/d" min="1" max ='13' name="idEstacionamento" required>
        <input type="submit" value="Buscar">
    </form>


    <hr/>
    <?php
    include '../estacionamento/cEstacionamento.php';

    ?> 

    <hr/>

        <a href="../colaborador/painel.php">Página Inicial</a><br>
        <a href="sair.php">Sair</a><br>



</body>
</html>