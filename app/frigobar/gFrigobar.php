<?php

    include_once '../_config/conn.php';


    $idAcomodacao = $_POST["idAcomodacao"];
    $fstatus = $_POST['fstatus'];
    

$consulta_frigobar = "SELECT * FROM parnaoica.frigobar WHERE idAcomodacao = '$idAcomodacao'";
$result = mysqli_query($con, $consulta_frigobar);

if(mysqli_num_rows($result) ==1){
    echo "A acomodação já possui Frigobar cadastrado";
}


else{

    
      $sqli = "INSERT INTO frigobar(idFrigobar, idAcomodacao, fstatus)  VALUES(null,
                '$idAcomodacao','$fstatus')";
    //echo $sql;    
    if(mysqli_query($con, $sqli)){
        echo "Gravado com sucesso!";
    }else{
        echo "Erro ao gravar!";
    }
}    
    mysqli_close($con);
?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_frigobar.php">Cadastrar outro Frigobar</a> <br>
<a href="../include/sair.php">Sair</a>
