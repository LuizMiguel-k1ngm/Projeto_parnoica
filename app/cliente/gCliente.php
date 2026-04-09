<?php
#gravar usuario


date_default_timezone_set("America/Sao_Paulo");

$nome = $_POST["nome"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$status = 'A'; //default para cadastro


$data_nascimento = $ano . "-" . $mes . "-" . $dia;



include_once '../_config/conn.php';


//consultar pelo CPF a existecia do cliente    
$consultacpf = "select * from parnaoica.cliente where cpf = '" . $cpf . "'";
$result = mysqli_query($con, $consultacpf);
if (mysqli_num_rows($result) == 1) {
    echo "Cliente já cadastrado!";
} else {


    $sqli = "insert into parnaoica.cliente values(null,
            '" . $nome . "','" . $data_nascimento . "','" . $cpf . "','" . $email . "', '" . $telefone . "', '" . $estado . "','" . $cidade . "', '" . $status . "' )";

    if ($con->query($sqli)) {
        //gravou cliente, tenta gravar endereço
        //retorna o id gerado pela ultima inserção
        echo "Gravado com sucesso!";
        $id = mysqli_insert_id($con);
    } else {
        echo "Erro ao gravar cliente!";
    }
}
$con->close();

?>
<br>
<a href="../include/cadastro_cliente.php">Cadastrar outro cliente</a><br>
<a href="../colaborador/menu_funcionario.php">Painel</a><br>
<a href="../include/sair.php">Sair</a>