<?php

  session_start();
    //session -> espaço de memória no BROWSER
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);
    
    //http://php.net/manual/pt_BR/function.mysql-real-escape-string.php
    
   include_once '../_config/conn.php';
   
 if (file_exists($path_conn)) {
    include_once $path_conn;
} else {
    die("Erro: Arquivo de conexão não encontrado em: " . $path_conn);
}

   echo $sqli = "select * from login where 
            usuario_login = '".$login."' AND senha = '".$senha."'";
    
    $result = mysqli_query($con, $sqli);
    
    if(mysqli_num_rows($result) >= 1){
        //echo "logado";
        $row = mysqli_fetch_array($result);
        $_SESSION["login"] = $row["usuario_login"]; 
        $_SESSION["perfil"] = $row["idFuncionario"]; // Usando o ID que vi na imagem
        $_SESSION["tempo"] = time();
    header("location: painel.php");
    exit();
        
    }else{
        $msg = "Login/Senha invalido(s)";
        header("location:index.php?msg=".$msg);
    }
















?>