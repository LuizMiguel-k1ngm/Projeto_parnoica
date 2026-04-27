<?php

 include_once '../_config/conn.php';

    $idFrigobar =  $_POST["idFrigobar"];
    $fstatus =  $_POST["fstatus"];
    

 
    $sqli = "update parnaoica.frigobar set fstatus = '".$fstatus."' where idFrigobar = '".$idFrigobar."' ";
    
    
    if(mysqli_query($con,$sqli)){
        echo "Dados atualizados com sucesso!";
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br />
<a href="../colaborador/menu_adm.php">Painel</a>
<br>
<a href="../include/consultar_frigobar.php">Consultar frigobar</a>
<br>
<a href="../include/sair.php">Sair</a>