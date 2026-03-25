<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>

<body>
    <h1>Cadastro Usuário</h1>

    <form action="../usuario/gUsuario" method="post">
        Nome: <br>
        <input type="text" name="nome" require="true">
        <br>
        Data de Nascimento: <br>
        <input type="date" name="data_nascimento" require="true">
        <br>

        CPF: <br>
        <input type="text" name="cpf" require="true">
        <br>

        Email: <br>
        <input type="text" name="email" require="true">
        <br>

        Telefone: <br>
        <input type="text" name="telefone" require="true">
        <br>

        Estado: <br>
        <input type="text" name="estado" require="true">

        <br>
        Cidade: <br>
        <input type="text" name="cidade" require="true">

        <br>
        <br>

        <input type="submit">


    </form>



</body>

</html>