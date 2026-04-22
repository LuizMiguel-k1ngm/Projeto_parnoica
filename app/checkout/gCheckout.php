<?php
<<<<<<< HEAD

//criar lógica de cobrança
=======
 
>>>>>>> 626e190af689bba4bea1379965b229023363742e
include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idReserva = $_POST['idReserva'] ?? null;
$rStatus = $_POST['rStatus'] ?? null;

$data_atual = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

<<<<<<< HEAD
    if (!empty($rStatus) && !empty($idReserva)) {

        if ($rStatus == 'confirmar') {
            $sqli = "UPDATE reserva SET rstatus = 'CO' WHERE idReserva = '$idReserva'";
            $msg = "Check-out realizado com sucesso!";
        } else if ($rStatus == 'cancelar') {
            $sqli = "UPDATE reserva SET rstatus = 'CA' WHERE idReserva = '$idReserva'";
            
            $msg = "Check-out cancelado com sucesso!";
        } else {
            $msg = "Erro ao gravar Check-out";
=======
        if($rStatus == 'confirmar check-out' ){
            $sqli = "UPDATE reserva SET rstatus = 'CO' WHERE idReserva = '$idReserva'";
            $msg = "Check-in realizado com sucesso!";
        } else if($rStatus == 'cancelar check-out') {
            $sqli = "UPDATE reserva SET rstatus = 'CA' WHERE idReserva = '$idReserva'";
            $msg = "Reserva cancelada com sucesso!";
        }else{
            echo "Erro ao gravar check-out";
>>>>>>> 626e190af689bba4bea1379965b229023363742e
        }



<<<<<<< HEAD

=======
>>>>>>> 626e190af689bba4bea1379965b229023363742e
        if (mysqli_query($con, $sqli)) {
            echo "<b>$msg</b>";
        } else {
            echo "Erro no banco de dados.";
        }
    } else {
        echo "Erro: O formulário não enviou 'idReserva' ou 'rStatus'.";
    }
}
