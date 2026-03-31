<?php

$nome = $_POST["nome"];
$numero_quarto = $_POST["numero_quarto"];
$aStatus = "A"; //default value
$tipoAcomodacao = $_POST["tipoAcomodacao"];
$capacidade = $_POST["capacidade"];
$valor = $_POST["valor"];

include_once '../_config/conn.php';

$sqli = "insert into parnaoica.acomodacao values(null,
            '" . $nome . "','" . $numero_quarto . "','" . $aStatus . "','" . $tipoAcomodacao . "', '" . $capacidade . "', '" . $valor . "' )";
if (mysqli_query($con, $sqli)) {
    echo "Gravado com sucesso!";
} else {
    echo "Erro ao gravar!";
}

mysqli_close($con);

?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_acomodacao.php">Cadastrar outro acomodacao</a> <br>
<a href="../include/sair.php">Sair</a>