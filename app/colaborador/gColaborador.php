<?php
include_once '../_config/conn.php';
# campos do tabela funcionario: idFuncionario (null), nome, status, idCargo; 
 

date_default_timezone_set("America/Sao_Paulo");
$nome = $_POST["nome"] ?? null;
$dia = $_POST["dia"] ?? null;
$mes = $_POST["mes"] ?? null;
$ano = $_POST["ano"] ?? null;
$cpf = $_POST["cpf"] ?? null;
$email = $_POST["email"] ?? null;
$telefone = $_POST["telefone"] ?? null;
$idCargo = $_POST["idCargo"] ?? null;
$status = 'A' ?? null;

$data_nascimento = $ano . "-" . $mes . "-" . $dia;

$consultacpf = "SELECT * from parnaoica.funcionario where cpf = '" . $cpf . "'";
$result = mysqli_query($con, $consultacpf);
if (mysqli_num_rows($result) == 1) {
    echo "Colaborador ja cadastrado!";
} else {


    $sqli = "INSERT into parnaoica.funcionario values(null,
            '" . $nome . "','" . $cpf . "','" . $telefone . "','" . $email . "', '" . $status . "', '" . $idCargo . "','" . $data_nascimento . "' )";

    if ($con->query($sqli)) {
        //gravou cliente, tenta gravar endereço
        //retorna o id gerado pela ultima inserção
        echo "Gravado com sucesso!";
        $id = mysqli_insert_id($con);
 
    


 
    } else {
        echo "Erro ao gravar cliente!";
    }
}
 
$con->close();

?>

<br>
<a href="../colaborador/painel.php">Página inicial</a><br>
<a href="../include/cadastro_colaborador.php">Cadastrar outro colaborador</a><br>
<a href="../include/sair.php">sair</a>