<?php
    require('../_config/conn.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
</head>

<body>

    <h1>Cadastro do frigobar</h1>
    <form action="../frigobar/gFrigobar.php" method="post">


        <select name="idAcomodacao">
            <?php 
                $sqlConsultaAcomodacao = "SELECT idAcomodacao, nome FROM acomodacao";
                $queryConsultaAcomodacao = mysqli_query($con, $sqlConsultaAcomodacao);

                while($row = mysqli_fetch_assoc($queryConsultaAcomodacao)) { ?>
                    <option value=<?= $row['idAcomodacao'] ?>><?= $row['nome'] ?></option>
                <?php }?>
            ?>
    
        </select>
        <br />
        <br>
        
        Frigobar status<br />
        <input type="radio" name="fstatus" value="A" required /> Ativo
        <input type="radio" name="fstatus" value="I" /> Inativo <br>


        <input type="submit" value="Enviar" />

    </form>




</body>

</html>