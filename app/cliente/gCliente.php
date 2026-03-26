<?php
#gravar usuario


date_default_timezone_set("America/Sao_Paulo");

$nome = $_POST["nome"];
$data_nascimento = $_POST["data_nascimento"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];



// $dtnasc = $ano . "-" . $mes . "-" . $dia;

include_once '../config/conn.php';


//consultar pelo CPF a existecia do cliente    
$consultacpf = "select * from cliente where cpf = '" . $cpf . "'";
$result = mysqli_query($con, $consultacpf);
if (mysqli_num_rows($result) == 1) {
    echo "Cliente ja cadastrado!";
} else {


    $sqli = "insert into parnaoica.cliente values(null,
            '" . $nome . "','" . $dtnasc . "','" . $cpf . "','" . $email . "', '" . $telefone . "', '" . $estado . "','" . $cidade . ")";

    if ($con->query($sqli)) {
        //gravou cliente, tenta gravar endereço
        //retorna o id gerado pela ultima inserção
        $id = mysqli_insert_id($con);

        $sql2 = "insert into endereco values(null,
                '" . $endereco . "','" . $cep . "','" . $estado . "','" . $cidade . "'," . $id . ")";

        if ($con->query($sql2)) {
            echo "Gravado com sucesso!";
        } else {
            echo "Erro ao gravar endereco!";
            //gravou cliente, mas nao gravou endereco...apaga cliente
            $sql3 = "delete from cliente where idcliente = " . $id;
            $con->query($sql3);
        }
    } else {
        echo "Erro ao gravar cliente!";
    }
}
$con->close();
