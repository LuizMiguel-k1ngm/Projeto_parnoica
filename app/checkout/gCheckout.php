<?php
@session_start();
include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idReserva = $_POST['idReserva'] ?? null;
$rStatus = $_POST['rStatus'] ?? null;
$data_atual = date('Y-m-d');

//puxar o id do cliente 
//depois dar update no cliente para Status de Inativo 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!empty($rStatus) && !empty($idReserva)) {
        $idusuario = "SELECT idusuario FROM reserva WHERE idReserva = '$idReserva'";
        $result_idusuario = mysqli_query($con, $idusuario);
        $result = $result_idusuario -> fetch_array()[0];


        if ($rStatus == 'confirmar') {
            $sqli = "UPDATE reserva SET rstatus = 'CO' WHERE idReserva = '$idReserva'";

            $sqli2 = "UPDATE cliente SET cStatus = 'I' WHERE idusuario = '$result'";

            $msg = "Check-out realizado com sucesso!";
        } else if ($rStatus == 'cancelar') {
            $sqli = "UPDATE reserva SET rstatus = 'CA' WHERE idReserva = '$idReserva'";
             $sqli2 = "UPDATE cliente SET cStatus = 'A' WHERE idusuario = '$result'";
            $msg = "Check-out cancelado com sucesso!";
        } else {
            $msg = "Erro ao gravar Check-out";
        }

        if (mysqli_query($con, $sqli)) {
        mysqli_query($con, $sqli2);
         echo "<b>$msg</b>";
         

            $log = fopen("../log/cadastrar_checkout.txt", "a+");
        
        fwrite($log, "Cadastrado em: " . date("d/m/Y") . " as " . date("H:i:s"));
        fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
        fwrite($log, "\nNumero da reserva: " . $idReserva);
        fwrite($log, "\nStatus: " . $rStatus);
     
        fwrite($log, "\n----------------------------\n\n");

       
        fclose($log);




        } else {
            echo "Erro no banco de dados.";
        }
    } else {
        echo "Erro: O formulário não enviou 'idReserva' ou 'rStatus'.";
    }
}