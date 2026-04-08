<?php
include_once '../_config/conn.php';
# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 

date_default_timezone_set("America/Sao_Paulo");
$nome = $_POST["nome"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$idCargo = $_POST["idCargo"];
$status = 'A';

$data_nascimento = $ano . "-" . $mes . "-" . $dia;

$consultacpf = "select * from parnaoica.funcionario where cpf = '" . $cpf . "'";
$result = mysqli_query($con, $consultacpf);
if (mysqli_num_rows($result) == 1) {
    echo "Colaborador ja cadastrado!";
} else {


    $sqli = "insert into parnaoica.funcionario values(null,
            '" . $nome . "','" . $cpf . "','" . $telefone . "','" . $email . "', '" . $status . "', '" . $idCargo . "','" . $data_nascimento . "' )";

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

