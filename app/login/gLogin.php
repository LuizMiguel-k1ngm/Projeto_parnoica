<?php
include_once '../_config/conn.php';


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


$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);




    $sqli = "INSERT into parnaoica.login (id, login, senha, idFuncionario) values(null,
            '$login', '$senha_criptografada', '$matricula')";

    if ($con->query($sqli)) {
        
        echo "Gravado com sucesso!"; 



        $id = mysqli_insert_id($con);
    } else {
        echo "Erro ao gravar cliente!";
    }
}
 
$con->close();




?>