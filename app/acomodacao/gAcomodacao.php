<?php
date_default_timezone_set("America/Sao_Paulo");

@session_start();

$nome = $_POST["nome"] ?? null;
$numero_quarto = $_POST["numero_quarto"] ?? null;
$aStatus = "A";
$tipoAcomodacao = $_POST["tipoAcomodacao"] ?? null;
$capacidade = $_POST["capacidade"] ?? null;
$valor = $_POST["valor"] ?? null;

$valor_sem_ponto = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor_sem_ponto);

include_once '../_config/conn.php';

$consulta_numero_quarto = "SELECT * FROM parnaoica.acomodacao WHERE numero_quarto = '" . $numero_quarto . "'";
$result = mysqli_query($con, $consulta_numero_quarto);

if (mysqli_num_rows($result) == 1) {
    echo "Número de acomodação já cadastrado!. Tente novamente";
} else {


$sqli = "INSERT INTO parnaoica.acomodacao (idAcomodacao, nome, numero_quarto, aStatus, tipoAcomodacao, capacidade, valor) VALUES (null, 
'$nome' ,'$numero_quarto' ,'$aStatus' ,'$tipoAcomodacao' ,'$capacidade' ,'$valor' )";      
   
         
if (mysqli_query($con, $sqli)) {
    echo "Gravado com sucesso!";
     
   
     $ultimoId = mysqli_insert_id($con);

  
    $sqli2 = "INSERT INTO parnaoica.estacionamento (idEstacionamento, status, idAcomodacao) VALUES(null, 'L', '$ultimoId')"; 

    if (mysqli_query($con, $sqli2)) {
 

       
        $log = fopen("../log/cadastrar_acomodacao.txt", "a+");
        //escrever o log
        fwrite($log, "Cadastrado em: " . date("d/m/Y") . " as " . date("H:i:s"));
        fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
        fwrite($log, "\nNome da acomodação: " . $nome);
        fwrite($log, "\nTipo: " . $tipoAcomodacao);
        fwrite($log, "\nStatus: " . $aStatus);
        fwrite($log, "\nCapacidade: " . $capacidade);
        fwrite($log, "\nValor: R$" . $valor);

        fwrite($log, "\n----------------------------\n\n");

       
        fclose($log);




    } else {
        echo "Erro ao gravar estacionamento!";
    }



} else {
    echo "Erro ao gravar!";
}

}

mysqli_close($con);

?>
<br>
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="../include/cadastro_acomodacao.php">Cadastrar outro acomodacao</a> <br>
<a href="../include/sair.php">Sair</a>