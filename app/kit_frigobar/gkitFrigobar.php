<?php
date_default_timezone_set("America/Sao_Paulo");
include_once '../_config/conn.php';

$idAcomodacao = $_POST['idAcomodacao'];
$idItens = $_POST['idItens'];
$quantidade = $_POST['quantidade'];
$dataConsumo = date('Y-m-d H:i');


if (empty($idAcomodacao) || empty($idItens) || empty($quantidade)) {
    echo "erro, campos inválidos";
} else if ($quantidade > 5) {
    echo "quantidade de itens excedidada";
} else {

    $sqlIdFrigobar = "SELECT idFrigobar FROM frigobar WHERE idAcomodacao = $idAcomodacao";
    $queryIdFrigobar = mysqli_query($con, $sqlIdFrigobar);
    $idFrigobar = mysqli_fetch_assoc($queryIdFrigobar);
    $rowIdFrigobar = $idFrigobar['idFrigobar'];


    $sqli = "INSERT INTO kit_frigobar(idConsumo, idReserva, idFrigobar, idItens, valor_unitario_pago, data_consumo)
    VALUES (NULL, '$rowIdFrigobar', '$idItens ', ' $quantidade', '$dataConsumo ') ";
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
<a href="../include/cadastro_kit_frigobar.php">Cadastrar outro item</a><br>
<a href="../colaborador/menu_adm.php">Painel</a><br>
<a href="../include/sair.php">Sair</a>