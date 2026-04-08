<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Cadastro de colaborador</h3>
    <form action="../colaborador/gColaborador.php" method="post">
        Nome: <br>
        <input type="text" name="nome" required pattern="[A-Za-z ]+">
        <br>


        Data de Nascimento:<br />
        <select name="dia" required>
            <option value="" />Dia
            <?php
            for ($i = 01; $i <= 31; $i++) {
                echo "<option value='" . $i . "'/>" . $i;
            }
            ?>
        </select>
        <select name="mes" required>
            <option value="" />Mês
            <?php
            for ($i = 01; $i <= 12; $i++) {
                echo "<option value='" . $i . "'/>" . $i;
            }
            ?>
        </select>
        <select name="ano" required>
            <option value="" />Ano
            <?php
            for ($i = date("Y"); $i >= date("Y") - 100; $i--) {
                echo "<option value='" . $i . "'/>" . $i;
            }
            ?>
        </select>
        </br>



        CPF: <br>
        <input type="text" name="cpf" require="true" required pattern="[0-9]{11}" minlength="11"
            placeholder="00000000000" title="digite apenas os números do CPF">
        <br>

        Email: <br>
        <input type="text" name="email" require="true" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
        <br>

        Telefone: <br>
        <input type="tel" name="telefone" require="true" required pattern="[0-9]{11}" placeholder="21911111111"
            title="Digite apenas os números do telefone sem espaços">
        <br>
        <br>

        Cargo<br />
        <input type="radio" name="idCargo" value="1" required /> Administrador
        <input type="radio" name="idCargo" value="2" required /> Funcionario <br>


        <input type="submit">


    </form>




</body>

</html>