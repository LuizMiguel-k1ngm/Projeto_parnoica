<?php
include_once '../_config/conn.php';

$idusuario = $_POST["idusuario"];
$idAcomodacao = $_POST["idAcomodacao"];
$data_checkin = $_POST["data_checkin"];
$data_checkout = $_POST["data_checkout"];
$n_clientes = $_POST["n_clientes"];



$data_atual = date('Y-m-d');
$entrada = new DateTime($data_checkin);
$saida = new DateTime($data_checkout);

  
$dias = $entrada->diff($saida);
$quantidade_dias = $dias->days;

//filtro para reservas



$sql_filtro = "SELECT id_reserva FROM parnaoica.reserva 
               WHERE id_acomodacao = '$idAcomodacao' 
               AND ('$data_checkin' < data_checkout AND '$data_checkout' > data_checkin)";

               
$resultado_filtro = mysqli_query($con, $sql_filtro);



//criar variavel para conferir status da acomodacao filtrando pelo ID

if($data_checkin <= $data_atual){
//erro de datas
echo("A data de checkin deve ser posterior a data atual");


}
if($saida <= $entrada){
    echo( "A data de checkin deve ser posterior a data atual");


}

if (mysqli_num_rows($resultado_filtro) > 0){
    echo("Desculpe! Esta acomodação já está ocupada no período selecionado.");
    //confirmada
    //colocar um switch case para calcular o valor por (id_acomodação*n_clientes)*quantidade_dias


}else{




}

#valor total pago ficou para pensar o que fazer com ele
// valor total pago da reserva = (valor_reserva * n_pessoas) * dias_de_reserva
// dias de reserva = diferença entre check-in e check-out, pode ser usado a função diff()


// include_once '../_config/conn.php';




$sqli = "insert into reserva values(null,
            '" . $idusuario . "','" . $idEstacionamento . "','" . $idAcomodacao . "',
             '" . $data_checkin . "', .'" . $data_checkout . "', '" . $n_clientes . "', null)";


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


//echo $sql;    
if (mysqli_query($con, $sqli)) {
    echo "Gravado com sucesso!";
} else {
    echo "Erro ao gravar!";
}


mysqli_close($con);

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