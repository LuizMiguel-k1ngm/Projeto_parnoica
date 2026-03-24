<?php
    #gravar reserva
    $idAcomodacao = $_POST["idAcomodacao"];
    $fstatus = $_POST["fstatus"];

    #valor total pago ficou para pensar o que fazer com ele

    include_once '../_config/conn.php';
    
      $sqli = "insert into frigobar values(null,
                '".$idAcomodacao."','".$fstatus."')";
    //echo $sql;    
    if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
    
    mysqli_close($con);
?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_frigobar.php">Cadastrar outro Frigobar</a> <br>
<a href="../include/sair.php">Sair</a>
