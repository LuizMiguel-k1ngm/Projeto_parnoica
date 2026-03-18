<?php
date_default_timezone_set("America/Sao_Paulo");

$nome = $_POST["nome"];
$data_nascimento = $_POST["data_nascimento"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];

//Expressao regex 

$regranome = "/^[a-z A-ZçÇà-üÀ-ÜñÑ]{3,50}$/";
    
$regraemail = "/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9-]+\.[a-zA-Z.]+$/";
    
$flag = 0;
$msg = "";




#regra do Nome
if(!preg_match($regranome, $nome)){
    $flag = 1;
    $msg = "Preencha o nome corretamente";
}


#regra do email
if(!preg_match($regraemail, $email)){
    $flag = 1;
    $msg = "</br>Preencha o email corretamente";
}
 
#regra data_nascimento
if($data_nascimento != ""){
    $data = explode("/", $data_nascimento);

    if(!checkdate($data[1], $data[0], $data[2])){
        $flag = 1;
        $msg = $msg . "</br data de nascimento invalida>";
    }else{
        $data = array_reverse($data);
        $data_nascimento = implode("-", $data);
    }
}

#regra cfp








#regra telefone







#regra estado







#regra cidade








#verificação de clientes já cadastrados









?>