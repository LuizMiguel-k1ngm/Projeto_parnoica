<?php

include '../_config/conn.php';

$mes_filtro = isset($_GET['mes']) ? $_GET['mes'] : date('m');

$sql = "SELECT a.nome, SUM(r.valor_total_pago) as total_lucro 
        FROM reserva r 
        INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao 
        WHERE MONTH(r.data_checkin) = '$mes_filtro' and rstatus = 'CO'
        GROUP BY a.idAcomodacao 
        ORDER BY total_lucro DESC";

$resultado = mysqli_query($con, $sql);

$nomes_grafico = [];
$valores_grafico = [];

if ($resultado) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $nomes_grafico[] = $linha['nome'];
        $valores_grafico[] = (float)$linha['total_lucro'];
    }
}

if (empty($nomes_grafico)) {
    $nomes_grafico = ["Sem dados"];
    $valores_grafico = "";

}



?>