<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- create - criar o registro do colaborador -->

<h1>gravar colaborador</h1>
 
    
</body>
</html>

<?php

# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 

    $nome = $_POST["nome"];
    $status = $_POST["status"];
    $idCargo = $_POST["idCargo"];

    include_once './conexao.php';
    
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
