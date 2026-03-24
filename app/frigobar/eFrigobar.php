<<<<<<< HEAD
<?php //session_start(); 
 include_once './validar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
    
<?php
 include_once '../colaborador/validar.php';
?>

<?php

    $idusuario = $_GET["idusuario"];
   
    include_once './conexao.php';
    
    $sqli = "delete from usuarios where idusuario = ".$idusuario;
    
    if(mysqli_query($con, $sqli)){
        echo "Deletado com sucesso Srº (ª) ".$_SESSION ["login"];
        
            //Criando Log de Operação "Gravado com Sucesso"
           $log= fopen("deletados.txt", "w");
            //escreve no arquivo
            fwrite($log, "Excluido em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nDeletado Por:" .$_SESSION["login"]);
            fwrite($log, "\nId Usuario: ".$idusuario);
            fwrite($log, "\nLogin: ".$sqli);
            fwrite($log, "\n----------------------------\n\n");
            
            //fecha o arquivo
            fclose($log);
        
        
        
        }else{
        echo "Erro ao deletar!";
    }
    mysqli_close($con);

    ?>
<br/>
<a href="painel.php">Voltar para o Painel</a>

    
</body>
</html>
=======
<?php

?>
>>>>>>> df98f19aaa8b2d8aeb25ab54b93b897a6b5a734d
