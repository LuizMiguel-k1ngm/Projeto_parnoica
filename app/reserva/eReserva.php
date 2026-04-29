<?php

date_default_timezone_set("America/Sao_Paulo");

if (!empty($_GET["cpf"])) {
    $cpf = $_GET["cpf"];
    include_once '../_config/conn.php';

    $data_atual = date('Y-m-d');

  
    $sqli = "SELECT c.nome, c.cpf, c.email, c.telefone, 
                    r.idReserva, r.data_checkin, r.data_checkout, 
                    a.nome AS nome_acomodacao, SUM(cf.total) as total_pago 
             FROM cliente c
             INNER JOIN reserva r ON c.idusuario = r.idusuario
             INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
             LEFT JOIN consumo_frigobar cf ON r.idReserva = cf.idReserva 
             WHERE c.cpf = '$cpf' AND r.data_checkout = '$data_atual' AND r.rstatus = 'CI'
             GROUP BY r.idReserva";
            
    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result);

    if ($totalregistros > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $idReserva = $row["idReserva"];
?>
<h3>Dados do Hóspede e Reserva</h3>
<table width="900px" border="1px" style="margin-bottom: 20px; border-collapse: collapse;">
    <tr bgcolor="#f2f2f2">
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Reserva</th>
        <th>Acomodação</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Total Consumo</th>
    </tr>
    <tr>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["idReserva"] ?></td>
        <td><?php echo $row["nome_acomodacao"] ?></td>
        <td><?php echo date('d/m/Y', strtotime($row["data_checkin"])) ?></td>
        <td><?php echo date('d/m/Y', strtotime($row["data_checkout"])) ?></td>
        <td>R$ <?php echo number_format($row["total_pago"] ?? 0, 2, ',', '.') ?></td>
    </tr>
</table>

<h4>Histórico de consumo do frigobar</h4>
<table width="600px" border="1px" style="border-collapse: collapse;">
    <tr bgcolor="#e8f4fd">
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor Unitário</th>
        <th>Subtotal</th>
    </tr>
    <?php
                
                $sql_itens = "SELECT i.nome, cf.quantidade, cf.valor_unitario_pago, cf.total 
                              FROM consumo_frigobar AS cf 
                              INNER JOIN itens AS i ON cf.idItens = i.idItens 
                              WHERE cf.idReserva = '$idReserva'";
                
                $result_itens = mysqli_query($con, $sql_itens);

                if (mysqli_num_rows($result_itens) > 0) {
                    while ($itens = mysqli_fetch_array($result_itens)) {
                ?>
    <tr>
        <td><?php echo $itens["nome"] ?></td>
        <td><?php echo $itens["quantidade"] ?></td>
        <td>R$ <?php echo number_format($itens["valor_unitario_pago"], 2, ',', '.') ?></td>
        <td>R$ <?php echo number_format($itens["total"], 2, ',', '.') ?></td>
    </tr>
    <?php 
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum item consumido nesta reserva.</td></tr>";
                }
                ?>
</table>
<hr>
<?php 
        } 
        echo "Total de registros encontrados: " . $totalregistros;
    } else {
        echo "Nenhum cliente com checkout pendente encontrado para este CPF hoje.";
    }
}
?>