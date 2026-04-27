<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Frigobar</title>
</head>

<body>
    <h3>Consulta cliente</h3>

    <form action="../relatorio/relatorio_clientes.php" method="get">
        Status do Cliente:
        <br>
        <input type="radio" name="cStatus" value="A" required /> Ativo
        <br>
        <input type="radio" name="cStatus" value="I" /> Inativo
        <br>
        <input type="submit" value="Gerar pdf">
    </form>



    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>
</body>

</html>