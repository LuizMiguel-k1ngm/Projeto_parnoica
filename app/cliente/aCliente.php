<?php
#atualização
 include_once '../_config/conn.php';

    $idusuario = $_POST["idusuario"];
    $email =  $_POST["email"];
    $telefone =  $_POST["telefone"];
    $cStatus =  $_POST["cStatus"];
    

    // mexer nessa parte do update do db
# update parnaoica.frigobar set fstatus = "I" where idFrigobar = 1;

#criar um jeito de criar uma tela que retorne a lista de frigobar cadastrados no db e colar as escolhas de
#alterar o status 

//fazer o update de multiplas variaveis 
    $sqli = "update parnaoica.cliente set email = '".$email."', telefone = '".$telefone."', cStatus = '".$cStatus."' where idusuario = '".$idusuario."' ";
    




    
    if(mysqli_query($con,$sqli)){
        echo "Dados atualizados com sucesso!";
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br/>
<a href="../index.php">Página Inicial</a>
