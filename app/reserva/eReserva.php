<?php
date_default_timezone_set("America/Sao_Paulo");

if (!empty($_GET["cpf"])) {
    $cpf = $_GET["cpf"];
    include_once '../_config/conn.php';

    $data_atual = date('Y-m-d');

    $sqli = "SELECT c.nome, c.cpf, c.email, c.telefone, 
                    r.idReserva, r.data_checkin, r.data_checkout, 
                    a.nome AS nome_acomodacao, sum(cf.valor_unitario_pago) as total_pago 
             FROM cliente c
             INNER JOIN reserva r ON c.idusuario = r.idusuario
             INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
             inner join consumo_frigobar cf on r.idReserva = cf.idReserva 
             WHERE c.cpf = '$cpf'  and r.data_checkout = '$data_atual' and r.rstatus = 'CI'
            GROUP BY c.nome, c.cpf, c.email, c.telefone, r.idReserva, r.data_checkin, r.data_checkout, a.nome";



    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result);






    if ($totalregistros > 0) {

?>
        <table width="900px" border="1px">
            <tr>
                <th>Nome</th>
                <th>cpf</th>
                <th>email</th>
                <th>telefone</th>
                <th>reserva</th>
                <th>acomodação</th>
                <th>data check-in</th>
                <th>data check-out</th>
                <th>Valor total consumo</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $idReserva = $row["idReserva"];
            ?>
                <tr>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo $row["cpf"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["telefone"] ?></td>
                    <td><?php echo $row["idReserva"] ?></td>
                    <td><?php echo $row["nome_acomodacao"] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row["data_checkin"])) ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row["data_checkout"])) ?></td>
                     <td><?php echo $row["total_pago"] ?></td>
                
                </tr>
            <?php } ?>
        </table>


<?php

        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum cliente encontrado!";
    }
}



?>