<?php
    #gravar reserva
    $idusuario = $_POST["idusuario"];
    $idEstacionamento = $_POST["idEstacionamento"];
    $idAcomodacao = $_POST["idAcomodacao"];
    $data_checkin = $_POST["data_checkin"];
    $data_checkout = $_POST["data_checkout"];
    $n_clientes = $_POST["n_clientes"];
    #valor total pago ficou para pensar o que fazer com ele



    include_once '../_config/conn.php';
    
    $sqli = "insert into reserva values(null,
            '".$idusuario."','".$idEstacionamento."','".$idAcomodacao."',
             '".$data_checkin ."', .'".$data_checkout."', '".$n_clientes."', null)";
    
    //echo $sql;    
    if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
    
    mysqli_close($con);
?>
<a href="../index.php">Painel de Controle</a>
