<?php

require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (!empty($_GET["data_inicial"]) && !empty($_GET['data_final'])) {
    $data_inicial = $_GET["data_inicial"];
    $data_final = $_GET['data_final'];

    include_once '../_config/conn.php';

    if($data_inicial > $data_final){
        echo "Erro: A data inicial não pode ser maior que a data final";
        exit();
    }





    $sqli = "SELECT c.nome, r.data_checkin, 
                    a.numero_quarto, a.tipoAcomodacao, a.capacidade, a.aStatus, a.valor
             FROM cliente AS c
             INNER JOIN reserva r ON c.idusuario = r.idusuario
             INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
             WHERE r.data_checkin BETWEEN '$data_inicial' AND '$data_final'";

    $result = mysqli_query($con, $sqli);

    
    ob_start(); 
    ?>

<style>
body {
    font-family: monospace;
    font-size: 12px;
    font-weight: bolder;

}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px 0;
}

th,
td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
}

th {
    background-color: greenyellow;
}

h2 {
    text-align: center;
}

.footer {
    margin-top: 15px;
    font-weight: bold;
}

.header {
    text-align: center;
    font-weight: bold;
}
</style>

<div class="header">
    ==============================================================<br>
    RELATÓRIO RESERVAS POR PERÍODO<br>
    ==============================================================
</div>
<p>Período: <?php echo date('d/m/Y', strtotime($data_inicial)); ?> até
    <?php echo date('d/m/Y', strtotime($data_final)); ?></p>

<?php if ($result && mysqli_num_rows($result) > 0): 
        $totalregistros = mysqli_num_rows($result);
    ?>
<table>
    <thead>
        <tr>
            <th>Hóspede</th>
            <th>N° quarto</th>
            <th>Tipo</th>
            <th>Capacidade</th>
            <th>Status</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?php echo $row["nome"] ?></td>
            <td><?php echo $row["numero_quarto"] ?></td>
            <td><?php echo $row["tipoAcomodacao"] ?></td>
            <td><?php echo $row["capacidade"] ?></td>
            <td><?php echo $row["aStatus"] ?></td>
            <td>R$ <?php echo number_format($row["valor"], 2, ',', '.') ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="footer">
    Total de registros: <?php echo $totalregistros; ?>
</div>

<?php else: ?>
<p>Nenhuma reserva encontrada para este período!</p>
<?php endif; ?>

<?php
   
    $html = ob_get_clean();

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('defaultFont', 'Arial');

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    
    $dompdf->render();

    $dompdf->stream("relatorio_reservas.pdf", array("Attachment" => false));

    mysqli_close($con);
}
?>