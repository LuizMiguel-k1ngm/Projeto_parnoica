<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Cadastro da reserva</h2>

    <form action="../reserva/gReserva.php" method="post">

        Número do cliente:<br />
        <input type="number" name="idusuario" pattern="/d"  min="1" required/><br />

        N° vaga do estacionamento:<br />
        <input type="number" name="idEstacionamento"  pattern="[0-9]{2}"  required  min= "1" max = "13"/><br />
        <br>

        <select name="Acomodacao">
            <option value=1>Suíte Lopes Mendes</option>
            <option value=2>Suíte Parnaoica</option>
            <option value=3>Suíte Lagoa Azul</option>
            <option value=4>Apartamento</option>
        </select>
        <br>

        <!--
            número Acomodação:<br/>
            <input type="text" name="idAcomodacao"/><br/>
            <br> -->
        <br>
        Data check-in:<br />
        <input type="date" name="data_checkin" /><br />
        <br>
        Data check-out:<br />
        <input type="date" name="data_checkout" /><br />
        <br>
        Numero de Pessoas:<br />
        <input type="number" name="n_clientes" min = '1' max = '4'/><br />
        <br>


        <input type="submit" value="Enviar" />

    </form>



</body>

</html>