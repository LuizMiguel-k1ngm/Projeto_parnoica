<?php
#gravar usuario

date_default_timezone_set("America/Sao_Paulo");

$nome = $_POST["nome"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$status = 'A'; //default para cadastro


$data_nascimento = $ano . "-" . $mes . "-" . $dia;

$data_formatada = date('d-m-Y', strtotime($data_nascimento));



include_once '../_config/conn.php';


//consultar pelo CPF a existecia do cliente    
$consultacpf = "SELECT * FROM parnaoica.cliente WHERE cpf = '" . $cpf . "'";
$result = mysqli_query($con, $consultacpf);
if (mysqli_num_rows($result) == 1) {
    echo "Cliente já cadastrado!";
} else {


    $sqli = "INSERT INTO parnaoica.cliente (idusuario, nome, data_nascimento, cpf, email, telefone, estado, cidade, cStatus)  values(null,
           '$nome' , '$data_nascimento' ,' $cpf ', '$email' , '$telefone' , '$estado' , '$cidade' , '$status'  )";

    if ($con->query($sqli)) {
        echo "Gravado com sucesso!";
        $id = mysqli_insert_id($con);

        //criar o log

        $log = fopen("../log/cadastrar_cliente.txt", "a+");
        //escrever o log
        fwrite($log, "Cadastrado em: " . date("d/m/Y") . " as " . date("H:i:s"));
        fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
        fwrite($log, "\nNome cliente: " . $nome);
        fwrite($log, "\nData de nascimento: " . $data_formatada);
        fwrite($log, "\nCPF: " . $cpf);
        fwrite($log, "\nEmail: " . $email);
        fwrite($log, "\nTelefone: " . $telefone);

        fwrite($log, "\n----------------------------\n\n");

        //fecha o arquivo
        fclose($log);
    } else {
        echo "Erro ao gravar cliente!";
    }
}
$con->close();

?>
<br>
<a href="../include/cadastro_cliente.php">Cadastrar outro cliente</a><br>
<a href="../colaborador/menu_funcionario.php">Painel</a><br>
<a href="../include/sair.php">Sair</a>