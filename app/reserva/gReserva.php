<?php
    #gravar reserva
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);
    $perfil = $_POST["perfil"];

    include_once './conexao.php';
    
    $sqli = "insert into usuarios values(null,
            '".$login."','".$senha."','".$perfil."')";
    
    //echo $sql;    
    if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
    
    mysqli_close($con);
?>
<a href="painel.php">Painel de Controle</a>
