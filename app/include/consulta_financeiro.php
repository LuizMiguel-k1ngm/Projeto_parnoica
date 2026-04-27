<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gerar Relatório</title>
</head>

<body>
    <h3>Relatório Financeiro (PDF)</h3>

    <form action="../relatorio/financeiro.php" method="get">
        Data inicial: <br>
        <input type="date" name="data_inicial" required><br><br>

        Data final: <br>
        <input type="date" name="data_final" required><br><br>

        <button type="submit">Gerar pdf</button>
    </form>

    <br>
    <a href="../colaborador/painel.php">Página inicial</a>
    <br>
    <a href="sair.php">Sair</a>
</body>

</html>