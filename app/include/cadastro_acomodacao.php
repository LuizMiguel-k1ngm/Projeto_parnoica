<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Cadastro acomodação</title>
</head>

<body>

    // criar um script para ver se existe o numero do quarto no db

    <h4>Cadastro acomodação</h4>

    <form action="../acomodacao/gAcomodacao.php" method="post">

        nome da acomodação:<br />
        <input type="text" name="nome" /><br />

        numero da acomodação:<br />
        <input type="number" name="numero_quarto" /><br />

        capacidade:<br />
        <input type="number" name="capacidade" /><br />

        valor:<br />
        <input type="number" name="valor" /><br />


        Tipo:<br />
        <input type="radio" name="tipoAcomodacao" value="suíte" />Suite
        <input type="radio" name="tipoAcomodacao" value="apartamento" />Apartamento
        <br />

        <input type="submit" value="Enviar" />

    </form>

</body>

</html>