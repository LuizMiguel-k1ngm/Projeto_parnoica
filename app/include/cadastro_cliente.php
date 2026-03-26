<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>



    <script type="text/javascript" src="../js/cidades-estados-v0.2.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            new dgCidadesEstados(
                document.getElementById('estado'),
                document.getElementById('cidade'),
                true
            );
        }
    </script>

    <style>
        #estado,
        #cidade {
            width: 190px;
        }
    </style>


</head>

<body>


    <h1>Cadastro Usuário</h1>

    <form action="../cliente/gCliente" method="post">
        Nome: <br>
        <input type="text" name="nome" required pattern="[A-Za-z ]+">
        <br>


        Data de Nascimento: <br>
        <input type="date" name="data_nascimento" id="data_nascimento" required max="current" max="2026-03-26"  >
</br>



        CPF: <br>
        <input type= "text" name="cpf" require="true" required pattern="[0-9]{11}" minlength="11" placeholder="00000000000" title="digite apenas os números do CPF">
        <br>

        Email: <br>
        <input type="text" name="email" require="true" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
        <br>

        Telefone: <br>
        <input type="tel" name="telefone" require="true" required pattern="[0-9]{11}" placeholder="21911111111" title="Digite apenas os números do telefone sem espaços">
        <br>

        Estado: <br>
        <select name="estado" id="estado">
        </select>
        <br>
        Cidade: <br>
        <select name="cidade" id="cidade">
            <option value="" />Escolha primeiro um estado
        </select>
        <br>
        <br>

        <input type="submit">


    </form>



</body>

</html>