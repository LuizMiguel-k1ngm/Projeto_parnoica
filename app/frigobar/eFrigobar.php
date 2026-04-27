<?php

$idFrigobar = $_GET["idFrigobar"];

include_once '../_config/conn.php';

$sqli = "delete from parnaoica.frigobar where id_frigobar=".$idFrigobar;

if (mysqli_query($con,$sqli)) {
    echo "Deletado com sucesso!";
} else {
    echo "Erro ao deletar!";
}
mysqli_close($con);
?>
<br />
<a href="../index.php">Página Inicial</a>