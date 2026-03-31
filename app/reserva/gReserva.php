<?php

//REFAZER COM CONDICIONAIS PARA CADA QUARTO 
    #gravar reserva
    $idusuario = $_POST["idusuario"];
    $idAcomodacao = $_POST["idAcomodacao"];
    $data_checkin = $_POST["data_checkin"];
    $data_checkout = $_POST["data_checkout"];
    $n_clientes = $_POST["n_clientes"];




    #criar objetos de data
    $entrada = new DateTime($data_checkin);
    $saida = new DateTime($data_checkout);

    #criar o intervalo de dias  
    $dias = $entrada -> diff($saida);

    #quantidade total de dias
    $quantidade_dias = $dias->days;


    #valor total pago ficou para pensar o que fazer com ele
    // valor total pago da reserva = (valor_reserva * n_pessoas) * dias_de_reserva
    // dias de reserva = diferença entre check-in e check-out, pode ser usado a função diff()


    include_once '../_config/conn.php';



    //atualizar as inputs do db;
    
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