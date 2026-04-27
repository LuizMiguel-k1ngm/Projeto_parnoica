<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização dos colaboradores</title>
</head>

<body>
    <?php

    $idFuncionario = $_GET["idFuncionario"];



    include_once '../_config/conn.php';


    $sqli = "select *
    from funcionario
    inner join cargo on funcionario.idCargo = cargo.idCargo and idFuncionario = " . $idFuncionario;


    $result = mysqli_query($con, $sqli);
    $row = mysqli_fetch_array($result);
    ?>

    <h3>Atualizar do informações do colaborador</h3>

    <form action="../colaborador/aColaborador.php" method="post">


        <input type="hidden" readonly="true" name="idFuncionario" value="<?php echo $row["idFuncionario"] ?>" />



        <?php echo 'Dados do usuário:' ?> <br> <br>
        <?php echo ' Matricula:' . $idFuncionario; ?> <br>
        <?php echo 'Nome: ' . $row["nome"]; ?> <br>
        <?php echo 'CPF: ' . $row["cpf"]; ?> <br>
        <?php echo 'Cargo: ' . $row["cargo_nome"]; ?> <br> <br>






        <h3>Mudar informações</h3> <br>
        Email: <br>
        <input type="text" name="email" require="true" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
        <br>
        <br><br>
        Novo telefone: <br><input type="tel" name="telefone" pattern="[0-9]{11}"
            title="Digite apenas os números do telefone sem espaços">
        <br>



        <h4>Status do colaborador</h4>
        <input type="radio" name="cStatus" value="A" required /> Ativo
        <input type="radio" name="cStatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Enviar" />

    </form>


    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>




</body>

</html>