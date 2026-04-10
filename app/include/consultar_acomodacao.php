<!-- <?php
        //include_once '../acomodacao/cAcomodacao.php';
        ?> -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta acomodação</title>
</head>

<body>

    <h3>Consulta Acomodação</h3>

    <form action="consultar_acomodacao.php" method="get">
        Tipo acomodação: <br>
        <input type="radio" name="tipoAcomodacao" value="suíte" required />Suíte
        <input type="radio" name="tipoAcomodacao" value="apartamento" />Apartamento <br>
        <br>
        Status: <br>
        <input type="radio" name="aStatus" value="A" required /> Ativo
        <input type="radio" name="aStatus" value="I" /> Inativo <br>
        <br>
        <input type="submit" value="Buscar">

    </form>

    <hr />


    <?php
    include_once '../acomodacao/cAcomodacao.php';
    ?>




    <hr />




</body>

</html>