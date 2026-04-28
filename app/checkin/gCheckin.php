<?php

include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idReserva = $_POST['idReserva'] ?? null;
$rStatus = $_POST['rStatus'] ?? null;

$data_atual = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($rStatus) && !empty($idReserva)) {
        $idusuario = "SELECT idusuario FROM reserva WHERE idReserva = '$idReserva'";
        $result_idusuario = mysqli_query($con, $idusuario);
        $result = $result_idusuario->fetch_array()[0];

        if ($rStatus == 'confirmar') {
            $sqli = "UPDATE reserva SET rstatus = 'CI' WHERE idReserva = '$idReserva'";
            $sqli2 = "UPDATE cliente SET cStatus = 'A' WHERE idusuario = '$result'";
            $msg = "Check-in realizado com sucesso!";
        } else if ($rStatus == 'cancelar') {
            $sqli = "UPDATE reserva SET rstatus = 'CA' WHERE idReserva = '$idReserva'";
            $msg = "Reserva cancelada com sucesso!";
        } else {
            $msg = "Erro ao gravar check-in";
        }



        if (mysqli_query($con, $sqli)) {
            mysqli_query($con, $sqli2);
            echo "<b>$msg</b>";
        } else {
            echo "Erro no banco de dados.";
        }
    } else {
        echo "Erro: O formulário não enviou 'idReserva' ou 'rStatus'.";
    }
}
