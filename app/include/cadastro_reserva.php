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
        <input type="number" name="idusuario" pattern="/d" min="1" required /><br />
        <!--
        N° vaga do estacionamento:<br />
        <input type="number" name="idEstacionamento" pattern="[0-9]{2}" required min="1" max="13" /><br />
          --> <br>

        <select name="idAcomodacao">
            <optgroup label="Escolha a acomodação">
                <option value=1>Suíte Lopes Mendes - R$ 2500.00</option>
                <option value=2>Suíte Parnaoica - R$ 3500.00</option>
                <option value=3>Suíte Lagoa Azul - R$ 4000.00</option>
                <option value=4>Apartamento 1 - R$ 1500.00</option>
                <option value=5>Apartamento 2 - R$ 1500.00</option>
                <option value=6>Apartamento 3 - R$ 1500.00</option>
                <option value=7>Apartamento 4 - R$ 1500.00</option>
                <option value=8>Apartamento 5 - R$ 1500.00</option>
                <option value=9>Apartamento 6 - R$ 1500.00</option>
                <option value=10>Apartamento 7 - R$ 1500.00</option>
                <option value=11>Apartamento 8 - R$ 1500.00</option>
                <option value=12>Apartamento 9 - R$ 1500.00</option>
                <option value=13>Apartamento 10 - R$ 1500.00</option>
            </optgroup>
        </select>

        <br>

        <br>
        Data check-in:<br />
        <input type="date" name="data_checkin" /><br />
        <br>
        Data check-out:<br />
        <input type="date" name="data_checkout" /><br />
        <br>
        Numero de Pessoas:<br />
        <input type="number" name="n_clientes" min='1' max='2' /><br />
        <br>
        <!-- criar o valor_total_pago-->


        <input type="submit" value="Enviar" />

    </form>



</body>

</html>