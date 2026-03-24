<?php
#atualização
    $idFrigobar =  $_POST["idAcomodacao"];
    $fstatus =  $_POST["fstatus"];
    
    //echo $dtnasc;
    
    include_once '../_config/conn.php';
    
    // mexer nessa parte do update do db
# update parnaoica.frigobar set fstatus = "I" where idFrigobar = 1;

#criar um jeito de criar uma tela que retorne a lista de frigobar cadastrados no db e colar as escolhas de
#alterar o status 

    $sqli = "update parnaoica.frigobar set 
            fstatus = '".$fstatus."'  where idFrigobar = '".$idFrigobar.;
    
    
    if(mysqli_query($con,$sqli)){
        echo "Dados atualizados com sucesso!";
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br/>
<a href="index.php">Página Inicial</a>
