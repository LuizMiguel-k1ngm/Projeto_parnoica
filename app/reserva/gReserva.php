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


$sql_filtro = "SELECT idReserva FROM parnaoica.reserva 
               WHERE idAcomodacao = '$idAcomodacao' 
               AND ('$data_checkin' < data_checkout AND '$data_checkout' > data_checkin)";


$resultado_filtro = mysqli_query($con, $sql_filtro);



$sql_filtro_valor = "SELECT * FROM parnaoica.acomodacao 
               WHERE idAcomodacao = '$idAcomodacao' ";


$resultado_valor_acomodacao_filtro = mysqli_query($con, $sql_filtro_valor);
$valor_acomodacao = mysqli_fetch_assoc($resultado_valor_acomodacao_filtro);

var_dump($valor_acomodacao);
 die;




//criar variavel para conferir status da acomodacao filtrando pelo ID

if ($data_atual <= $entrada) {
    //erro de datas
    echo "A data de check-in deve ser posterior a data atual";
} else if ($saida <= $entrada) {
    //conferir se a acomodação está disponivel;
    echo "A data de check-out deve ser posterior a data de check-in";
} else if (mysqli_num_rows($resultado_filtro) > 0) {
    echo ("Desculpe! Esta acomodação já está ocupada no período selecionado.");
} else {

    $valor_total_pago = ($valor_acomodacao * $n_clientes) * $quantidade_dias;

    $sqli = "insert into reserva values(null,
            '" . $idusuario . "','" . $idEstacionamento . "','" . $idAcomodacao . "',
             '" . $data_checkin . "', .'" . $data_checkout . "', '" . $n_clientes . "', null)";



    if (mysqli_query($con, $sqli)) {
        echo "Gravado com sucesso!";
    }else {
        echo "Erro ao gravar!";
    }
}

mysqli_close($con);


?>
<a href="../index.php">Painel de Controle</a>