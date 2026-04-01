<?php
include_once '../_config/conn.php';

$idAcomodacao = $_POST['idAcomodacao'];
$aStatus = $_POST['aStatus'];
$valor = $_POST['valor'];


if(!empty($aStatus) && !empty($valor)){

   $sqli = "update parnaoica.acomodacao set aStatus = '" . $aStatus . "', valor = '" . $valor . "' where idAcomodacao = '" . $idAcomodacao . "' ";
}else if (!empty($aStatus)){

    $sqli = "update parnaoica.acomodacao set aStatus = '" . $aStatus . "' where idAcomodacao = '" . $idAcomodacao. "'";

}else{

    $sqli = "update parnaoica.cliente set valor = '" . $valor . "' where idAcomodacao = '" . $idAcomodacao . "'";
}

if (mysqli_query($con, $sqli)) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="../colaborador/painel.php">Painel</a>
<br>
<a href="../include/sair.php">Sair</a>




