<?php

//criar lógica de cobrança
include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idReserva = $_POST['idReserva'] ?? null;
$rStatus = $_POST['rStatus'] ?? null;

$data_atual = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($rStatus) && !empty($idReserva)) {

        if ($rStatus == 'confirmar') {
            $sqli = "UPDATE reserva SET rstatus = 'CO' WHERE idReserva = '$idReserva'";
            $msg = "Check-out realizado com sucesso!";
        } else if ($rStatus == 'cancelar') {
            $sqli = "UPDATE reserva SET rstatus = 'CA' WHERE idReserva = '$idReserva'";
            
            $msg = "Check-out cancelado com sucesso!";
        } else {
            $msg = "Erro ao gravar Check-out";
        }




        if (mysqli_query($con, $sqli)) {
            echo "<b>$msg</b>";
        } else {
            echo "Erro no banco de dados.";
        }
    } else {
        echo "Erro: O formulário não enviou 'idReserva' ou 'rStatus'.";
    }
}
