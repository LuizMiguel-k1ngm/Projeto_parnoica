<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Cosulta Reserva</title>
</head>

<body>

    <h3>Consulta das reservas</h3>

    <form action="cReserva.php" method="get">
        Status da Reserva: <br>
        <select name="idAcomodacao">
            <optgroup label="Status da Reserva">
                <option value=1>Pendente</option>
                <option value=2>Confirmado</option>
                <option value=3>Check-in</option>
                <option value=4>Cancelado</option>
                <option value=5>No show</option>
                <option value=6>Check-out</option>
                <option value=7>Rejeitado</option>
            </optgroup>
        </select>


        <input type="submit" value="Buscar">

        <hr>
        <?php
        include '../reserva/cReserva.php';

        ?>
        <hr>
    </form>


    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>



</body>

</html>