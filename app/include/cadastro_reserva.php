<?php
require('../_config/conn.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Cadastro da reserva</h2>

    <form action="../reserva/gReserva.php" method="post">

        <select name="idCliente">
            <?php $sqlConsultaCliente = "SELECT idusuario, nome FROM cliente";
            $queryConsultaCliente = mysqli_query($con, $sqlConsultaCliente);
            while ($row = mysqli_fetch_assoc($queryConsultaCliente)) { ?> <option value=<?= $row['idusuario'] ?>><?= $row['nome']
                                                            ?></option> <?php } ?> </select>

        <br><br>

        <select name="idAcomodacao">
            <?php
            $sqlConsultaAcomodacao = "SELECT idAcomodacao, nome FROM acomodacao";
            $queryConsultaAcomodacao = mysqli_query($con, $sqlConsultaAcomodacao);

            while ($row = mysqli_fetch_assoc($queryConsultaAcomodacao)) { ?>
            <option value=<?= $row['idAcomodacao'] ?>><?= $row['nome'] ?></option>
            <?php } ?>

        </select>

        <br>

        <br>
        Data check-in:<br />
        <input type="date" name="data_checkin" /><br />
        <br>
        Data check-out:<br />
        <input type="date" name="data_checkout" /><br />
        <br>
        Numero de Pessoas:<br />
        <input type="number" name="n_clientes" min='1' max='2' /><br />
        <br>


        <input type="submit" value="Enviar" />

    </form>

    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>



</body>

</html>