<?php

date_default_timezone_set("America/Sao_Paulo");
include_once '../_config/conn.php';

$reserva = $_POST['idReserva'] ?? null;
$idItens = $_POST['idItens'] ?? null;
$quantidade = $_POST['quantidade'] ?? null;
$data_consumo = date('Y-m-d H:i');

$data_consumo;

if(empty($reserva)|| empty($idItens) || empty($quantidade)){
    echo "erro, campos inválidos";

}else {


//resulta da pesquisa por acomodacao
$sql_idAcomodacao = "SELECT idAcomodacao FROM reserva WHERE idReserva = $reserva"; 
$query_idAcomodacao = mysqli_query($con, $sql_idAcomodacao);
$idAcomodacao = mysqli_fetch_assoc($query_idAcomodacao);
$row = $idAcomodacao['idAcomodacao'];

// $resultado = $query->fetch_all(MYSQLI_ASSOC);

//resultado pesquisa por id do frigobar
$sql_idFrigobar = "SELECT idFrigobar FROM frigobar WHERE idAcomodacao = $row"; 
$query_idFrigobar = mysqli_query($con, $sql_idFrigobar);
$idFrigobar = mysqli_fetch_assoc($query_idFrigobar);
$row_frigobar = $idFrigobar['idFrigobar'];


$sql_valor = "SELECT valor FROM itens WHERE idItens = $idItens";
$query_valor = mysqli_query($con, $sql_valor); 
$valor = mysqli_fetch_assoc($query_valor);
$row_valor = $valor['valor'];



$sqli = "INSERT INTO consumo_frigobar(idConsumo, idReserva, idFrigobar, idItens, quantidade, valor_unitario_pago, data_consumo)
VALUES(NULL,
 '$reserva', '$row_frigobar', '$idItens', '$quantidade','$row_valor', '$data_consumo')";

  if ($con->query($sqli)) {
        echo "Gravado com sucesso!";
        $id = mysqli_insert_id($con);
    } else {
        echo "Erro ao gravar item!";
    }
}
$con->close();

?>

<br>
<a href="../include/cadastro_itensFrigobar.php">Cadastrar outro item</a><br>
<a href="../colaborador/menu_adm.php">Painel</a><br>
<a href="../include/sair.php">Sair</a>