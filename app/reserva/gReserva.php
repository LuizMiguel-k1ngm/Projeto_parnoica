<?php
$idusuario = $_POST["idusuario"];
$idAcomodacao = $_POST["idAcomodacao"];
$data_checkin = $_POST["data_checkin"];
$data_checkout = $_POST["data_checkout"];
$n_clientes = $_POST["n_clientes"];


$entrada = new DateTime($data_checkin);
$saida = new DateTime($data_checkout);

  
$dias = $entrada->diff($saida);


$quantidade_dias = $dias->days;


include_once '../_config/conn.php';


if($saida <= $entrada){
//erro de datas
echo "A data de check-out deve ser posterior a data de check-in";


}else if(){
//conferir se a acomodação está disponivel;


}

else{
    //confirmada
    //colocar um switch case para calcular o valor por (id_acomodação*n_clientes)*quantidade_dias


}


#valor total pago ficou para pensar o que fazer com ele
// valor total pago da reserva = (valor_reserva * n_pessoas) * dias_de_reserva
// dias de reserva = diferença entre check-in e check-out, pode ser usado a função diff()


// include_once '../_config/conn.php';



<<<<<<< HEAD
$sqli = "insert into reserva values(null,
            '" . $idusuario . "','" . $idEstacionamento . "','" . $idAcomodacao . "',
             '" . $data_checkin . "', .'" . $data_checkout . "', '" . $n_clientes . "', null)";
=======

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
>>>>>>> f6d956413405c6a6608eb9e181d5ec99356127ff

//echo $sql;    
if (mysqli_query($con, $sqli)) {
    echo "Gravado com sucesso!";
} else {
    echo "Erro ao gravar!";
}

<<<<<<< HEAD
mysqli_close($con);
=======
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
>>>>>>> f6d956413405c6a6608eb9e181d5ec99356127ff
?>
<a href="../index.php">Painel de Controle</a>