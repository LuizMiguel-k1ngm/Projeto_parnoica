<?php
    require('../_config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro itens frigobar</title>
</head>
<body>


    <h1>Cadastro itens no frigobar</h1>
    <form action="../itens_frigobar/gItens_Frigobar.php" method="post">

       Código da reserva: <br><select name="idReserva">
            <?php 
                $sqlConsultaReserva = "SELECT idReserva, idAcomodacao FROM reserva";
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
                    <option value=<?= $row['idItens'] ?>><?= $row['nome']?>, R$<?= $row['valor']?> </option>
                   
                <?php }?>

        
           ?>
           <br>
           
        </select>

      <input type="number" name = "quantidade" max = 10 min = 1 required placeholder="1" default = 1> 






        <br />
        <br>
        

        <input type="submit" value="Enviar" />

    </form>

</body>
</html>