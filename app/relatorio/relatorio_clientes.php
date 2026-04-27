<?php

require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (!empty($_GET["cStatus"])) {
    $cStatus = $_GET["cStatus"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.cliente where cStatus like '" . $cStatus . "%'";

    $result = mysqli_query($con, $sqli);
 $totalregistros = mysqli_num_rows($result); 

    if ($totalregistros > 0) {

   
    
     ob_start();

?>

<style>
body {
    font-family: sans-serif;
    font-size: 12px;
    font-weight: bolder;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #333;
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
    RELATÓRIO CLIENTES <br>
    ==============================================================
</div>
<table width="900px" border="1px">
    <tr>
        <th>Id do cliente</th>
        <th>Nome</th>
        <th>cpf</th>
        <th>email</th>
        <th>telefone</th>
        <th>Status</th>

    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

    <tr>
        <td><?php echo $row["idusuario"] ?></td>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["cStatus"] ?></td>

    </tr>

    <?php
            }

            ?>



</table>
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum cliente encontrado!";
    }

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