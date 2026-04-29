<?php
@session_start();
include_once '../_config/conn.php';
date_default_timezone_set("America/Sao_Paulo");

$idusuario = $_POST["idusuario"] ?? null;
$email =  $_POST["email"] ?? null;
$telefone =  $_POST["telefone"] ?? null;
$cStatus =  $_POST["cStatus"] ?? null;

$telefone_fomartado = trim($telefone);
$email_formatado = trim($email);

if (!empty($telefone_fomartado) && !empty($email_formatado)) {

    $sqli = "update parnaoica.cliente set email = '" . $email . "', telefone = '" . $telefone . "', cStatus = '" . $cStatus . "' where idusuario = '" . $idusuario . "' ";
} else if (!empty($telefone_fomartado)) {

    $sqli = "update parnaoica.cliente set telefone = '" . $telefone . "', cStatus = '" . $cStatus . "' where idusuario = '" . $idusuario . "' ";
} else if (!empty($email_formatado)) {
    $sqli = "update parnaoica.cliente set email = '" . $email . "', cStatus = '" . $cStatus . "' where idusuario = '" . $idusuario . "' ";
} else {
    $sqli = "update parnaoica.cliente set cStatus = '" . $cStatus . "' where idusuario = '" . $idusuario . "'";
}





if (mysqli_query($con, $sqli)) {
    echo "Dados atualizados com sucesso!";

    $log = fopen("../log/atualizar_cliente.txt", "a+");
        
        fwrite($log, "Cadastrado em: " . date("d/m/Y") . " as " . date("H:i:s"));
        fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
        fwrite($log, "\nId cliente: " . $idusuario);
        fwrite($log, "\nEmail: " . $email);
        fwrite($log, "\nTelefone: " . $telefone);
        fwrite($log, "\nStatus cliente: " . $cStatus);

        fwrite($log, "\n----------------------------\n\n");

      
        fclose($log);



} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="../colaborador/menu_adm.php">Página Inicial</a>