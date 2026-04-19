<?php
include_once '../_config/conn.php';
# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 

date_default_timezone_set("America/Sao_Paulo");
$matricula = $_POST["matricula"] ?? null;
$login = $_POST["login"] ?? null;
$senha = $_POST["senha"] ?? null;
$perfil = $_POST["perfil"] ?? null;



$consulta_login = " SELECT * FROM parnaoica.login WHERE login = '$login'";
$result = mysqli_query($con, $consulta_login);
if (mysqli_num_rows($result) == 1) {
    echo "Login indisponível!";
} else {


    $sqli = "INSERT into parnaoica.login (id, login, senha, matricula) values(null,
            '$login', '$senha', '$matricula')";

    if ($con->query($sqli)) {
        //gravou cliente, tenta gravar endereço
        //retorna o id gerado pela ultima inserção
        echo "Gravado com sucesso!";
        $id = mysqli_insert_id($con);
    } else {
        echo "Erro ao gravar cliente!";
    }
}
<<<<<<< HEAD
$con->close();
=======
$con->close();
>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4
