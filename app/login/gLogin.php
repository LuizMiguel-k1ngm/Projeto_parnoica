<?php
include_once '../_config/conn.php';
# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 

date_default_timezone_set("America/Sao_Paulo");
$matricula = $_POST["matricula"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$perfil = $_POST["perfil"];



$consulta_login = "select * from parnaoica.login where login = '" . $login . "'";
$result = mysqli_query($con, $consulta_login);
if (mysqli_num_rows($result) == 1) {
    echo "Login indisponível!";
} else {


    $sqli = "insert into parnaoica.login values(null,
            '" . $login . "','" . $senha . "','" . $matricula . "')";

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

