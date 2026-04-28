<?php
require_once '../vendor/autoload.php';
use Dompdf\Dompdf;

include_once '../_config/conn.php';

$data_i = $_GET['data_inicial'] ?? null;
$data_f = $_GET['data_final'] ?? null;



if(empty($data_f) ||  empty($data_i)){

    echo "datas inválidas";
    die();
}


ob_start();
?>

<style>
body {
    font-family: monospace;
    font-size: 12px;

}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
}

th,
td {
    border: 1px solid #000;
    padding: 5px;
    text-align: left;
}

.header {
    text-align: center;
    font-weight: bold;
}
</style>

<div class="header">
    ==============================================================<br>
    RELATÓRIO FINANCEIRO POR PERÍODO<br>
    ==============================================================
</div>

<p>Período: <?=date('d/m/Y', strtotime($data_i))?> a <?=date('d/m/Y', strtotime($data_f))?></p>

<h4>RESERVAS</h4>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Quarto</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Diaria</th>
        <th>N°</th>
        <th>Total</th>
    </tr>
    <?php
    $t_res = 0;
    $sql_res = "SELECT r.idReserva,  c.nome, a.nome as quarto, r.n_clientes, r.data_checkin, r.data_checkout, a.valor, r.valor_total_pago
                FROM reserva r
                JOIN cliente c ON r.idusuario = c.idusuario
                JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
                WHERE r.data_checkin BETWEEN '$data_i' AND '$data_f'";
    $q_res = mysqli_query($con, $sql_res);
    while($r = mysqli_fetch_assoc($q_res)): 
        $t_res += $r['valor'];
    ?>
    <tr>
        <td><?=str_pad($r['idReserva'], 4, '0', STR_PAD_LEFT)?></td>
        <td><?=$r['nome']?></td>
        <td><?=$r['quarto']?></td>
        <td><?=date('d/m/y', strtotime($r['data_checkin']))?></td>
        <td><?=date('d/m/y', strtotime($r['data_checkout']))?></td>
        <td>R$ <?=number_format($r['valor'], 2, ',', '.')?></td>
        <td><?=$r['n_clientes']?></td>
        <td>R$ <?=number_format($r['valor_total_pago'], 2, ',', '.')?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h4>CONSUMOS</h4>
<table>
    <tr>
        <th>Reserva</th>
        <th>Item</th>
        <th>Qtd</th>
        <th>Total</th>
    </tr>
    <?php
    $t_con = 0;
    $sql_con = "SELECT r.idReserva, i.nome, cf.quantidade, cf.total
                FROM consumo_frigobar cf
                JOIN reserva r ON cf.idReserva = r.idReserva
                JOIN itens i ON cf.idItens = i.iditens
                WHERE r.data_checkin BETWEEN '$data_i' AND '$data_f'";
    $q_con = mysqli_query($con, $sql_con);
    while($c = mysqli_fetch_assoc($q_con)): 
        $t_con += $c['total'];
    ?>
    <tr>
        <td><?=str_pad($c['idReserva'], 4, '0', STR_PAD_LEFT)?></td>
        <td><?=$c['nome']?></td>
        <td><?=$c['quantidade']?></td>
        <td>R$ <?=number_format($c['total'], 2, ',', '.')?></td>
    </tr>
    <?php endwhile; ?>
</table>

<div style="border: 2px solid #000; padding: 10px; margin-top: 20px;">
    <strong>TOTAL RESERVAS: R$ <?=number_format($t_res, 2, ',', '.')?></strong><br>
    <strong>TOTAL CONSUMO: R$ <?=number_format($t_con, 2, ',', '.')?></strong><br>
    <hr>
    <strong>TOTAL FINAL: R$ <?=number_format($t_res + $t_con, 2, ',', '.')?></strong>
</div>

<?php

$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("relatorio_financeiro.pdf", ["Attachment" => false]);
exit;
?>