<?php
    require('../_config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro consumo itens frigobar</title>
</head>

<body>


    <h1>Cadastro itens consumidos do frigobar</h1>
    <form action="cadastro_itensFrigobar.php" method="post">

        Código da reserva: <br><select name="idReserva">
            <?php 
                $sqlConsultaReserva = "SELECT idReserva, idAcomodacao FROM reserva WHERE rstatus = 'CI'";
                $queryConsultaReserva = mysqli_query($con, $sqlConsultaReserva);

                while($row = mysqli_fetch_assoc($queryConsultaReserva)) { ?>
            <option value=<?= $row['idReserva'] ?>><?= $row['idReserva']?> </option>
            <?php }?>
            ?>
        </select>
        <br><br>


        <select name="idItens">
            <?php 
                $sqlConsultaItens = "SELECT idItens, nome, valor FROM itens";
                $queryConsultaItens = mysqli_query($con, $sqlConsultaItens);

                while($row = mysqli_fetch_assoc($queryConsultaItens)) { ?>
            <option value=<?= $row['idItens'] ?>><?= $row['nome']?> | R$<?= $row['valor']?> </option>

            <?php }?>


            ?>
            <br>

        </select>

        <input type="number" name="quantidade" max=5 min=1 required placeholder="0" default=1>






        <br />
        <br>


        <input type="submit" value="Enviar" /> <br>
        
        <?php include '../itens_frigobar/gItens_Frigobar.php'?>

    </form>
    <br><br>
    <a href="../colaborador/painel.php">Inicio</a>
    <br>
    <a href="../include/sair.php">Sair</a>

</body>

</html>