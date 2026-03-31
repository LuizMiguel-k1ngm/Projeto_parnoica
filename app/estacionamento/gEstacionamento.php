<?php

$idEstacionamento = $_POST["idEstacionamento"];
$status = $_POST["status"];

include_once '../_config/conn.php';

$sqli = "insert into parnaoica.estacionamento values(null, '".$status."')";

if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
    
    mysqli_close($con);

?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_estacionamento.php">Cadastrar outro vaga no estacionamento</a> <br>
<a href="../include/sair.php">Sair</a>