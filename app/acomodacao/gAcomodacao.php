<?php

$nome = $_POST["nome"] ?? null;
$numero_quarto = $_POST["numero_quarto"] ?? null;
$aStatus = "A"; //default value
$tipoAcomodacao = $_POST["tipoAcomodacao"] ?? null;
$capacidade = $_POST["capacidade"] ?? null;
$valor = $_POST["valor"] ?? null;

$valor_sem_ponto = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor_sem_ponto);

include_once '../_config/conn.php';

$consulta_numero_quarto = "SELECT * from parnaoica.acomodacao where numero_quarto = '" . $numero_quarto . "'";
$result = mysqli_query($con, $consulta_numero_quarto);

if (mysqli_num_rows($result) == 1) {
    echo "Número de acomodação já cadastrado!. Tente novamente";
} else {

$sqli = "INSERT into parnaoica.acomodacao values(null,
            '" . $nome . "','" . $numero_quarto . "','" . $aStatus . "','" . $tipoAcomodacao . "', '" . $capacidade . "', '" . $valor . "' )";            
if (mysqli_query($con, $sqli)) {
    echo "Gravado com sucesso!";
} else {
    echo "Erro ao gravar!";
}

}
$con->close();
// mysqli_close($con);

?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_acomodacao.php">Cadastrar outro acomodacao</a> <br>
<a href="../include/sair.php">Sair</a>