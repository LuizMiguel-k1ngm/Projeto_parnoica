<?php
<<<<<<< HEAD
include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idReserva = $_POST['idReserva'] ?? null;
$rStatus = $_POST['rStatus'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(!empty($rStatus) && !empty($idReserva)){

        if($rStatus == 'confirmar'){
            $sqli = "UPDATE reserva SET rStatus = 'CI' WHERE idReserva = '$idReserva'";
            $msg = "Check-in realizado com sucesso!";
        } else if($rStatus == 'cancelar') {
            $sqli = "UPDATE reserva SET rStatus = 'CA' WHERE idReserva = '$idReserva'";
            $msg = "Reserva cancelada com sucesso!";
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
=======




>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4
?>