<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de clientes</title>
</head>

<body>
    <?php

    $idusuario = $_GET["idusuario"];



    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.cliente where idusuario = " . $idusuario;
    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($result);
    ?>

    <!-- editar/atualizar o frigobar -->
    <h3>Atualizar do informações dos clientes</h3>

    <form action="../cliente/aCliente.php" method="post">


        <input type="hidden" readonly="true" name="idusuario" value="<?php echo $row["idusuario"] ?>" />



        <?php echo 'Dados do usuário:' ?> <br> <br>
        <?php echo ' Id usuario:' . $idusuario; ?>  <br>
        <?php echo 'Nome: '. $row["nome"]; ?>  <br>
        <?php echo 'CPF: '. $row["cpf"]; ?> <br> <br>





        <h3>Mudar informações</h3> 
         Novo email: <br><br>
        <input type="text" name="email" require="true" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
        
         <br><br>
        Novo telefone: <br><input type="tel" name = "telefone" require="true" required pattern="[0-9]{11}"  title="Digite apenas os números do telefone sem espaços" >
         <br>



       <h4>Status do cliente</h4><input type="radio" name="cStatus" value="A" 
         /> Ativo
        <input type="radio" name="cStatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Enviar" />

    </form>




</body>

</html>