<?php

# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 

    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $idCargo = $_POST["idCargo"];

    include_once '../_config/conexao.php';
    
    $sqli = "insert into funcionario values(null,
            '".$nome."','".$status."','".$idCargo."')";
    
    //echo $sql;    
    if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
    
    mysqli_close($con);
?>
<a href="painel.php">Painel de Controle</a>
