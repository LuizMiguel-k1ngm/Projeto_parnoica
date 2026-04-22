<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar acomodação</title>
</head>

<body>

    <?php
    $numero_quarto = $_GET["numero_quarto"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.acomodacao where numero_quarto = " . $numero_quarto;
    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($result);

    ?>

    <form action="../acomodacao/aAcomodacao.php" method="post">


        <input type="hidden" readonly="true" name="idAcomodacao" value="<?php echo $row["idAcomodacao"] ?>" />

        <?php echo 'Dados da acomodação:' ?> <br><br>
        <?php echo ' Nome: ' . $row["nome"] ?> <br>
        <?php echo ' numero do quarto: ' . $numero_quarto ?> <br>
        <?php echo ' Status: ' . $row['aStatus']; ?> <br>
        <?php echo ' Tipo: ' . $row['tipoAcomodacao']; ?> <br>
        <?php echo ' Valor: ' . $row['valor']; ?> <br>


        <h3>Atualizar do acomodação</h3>
        selecione o status<br />

        <input type="radio" name="aStatus" value="A" /> Ativo
        <input type="radio" name="aStatus" value="I" /> Inativo <br>
        <br>

        valor: <input type="number" name="valor">

        <input type="submit" value="Enviar" />

    </form>


    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>

</body>

</html>