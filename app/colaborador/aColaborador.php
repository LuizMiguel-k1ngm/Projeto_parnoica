<?php

include_once '../_config/conn.php';

$idFuncionario = $_POST["idFuncionario"] ?? null;
$email =  $_POST["email"] ?? null;
$telefone =  $_POST["telefone"] ?? null;
$cStatus =  $_POST["cStatus"] ?? null;



$telefone_fomartado = trim($telefone);
$email_formatado = trim($email);

if (!empty($telefone_fomartado) && !empty($email_formatado)) {

    $sqli = "update parnaoica.funcionario set telefone = '" . $telefone . "', email = '" . $email . "', status = '" . $cStatus . "' where idFuncionario = '" . $idFuncionario . "' ";
} else if (!empty($telefone_fomartado)) {

    $sqli = "update parnaoica.funcionario set telefone = '" . $telefone . "', status = '" . $cStatus . "' where idFuncionario = '" . $idFuncionario . "' ";
} else if (!empty($email_formatado)) {
    $sqli = "update parnaoica.funcionario set email = '" . $email . "', status = '" . $cStatus . "' where idFuncionario = '" . $idFuncionario . "' ";
} else {
    $sqli = "update parnaoica.funcionario set status = '" . $cStatus . "' where idFuncionario = '" . $idFuncionario . "'";
}

if (mysqli_query($con, $sqli)) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="../colaborador/menu_adm.php">Página Inicial</a> <br>
<a href="../index.php">sair</a>