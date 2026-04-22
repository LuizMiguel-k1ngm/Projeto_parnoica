
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>

<body>
<!-- Seria a tele de cadastro login do funcionario -->   

    <h4>Cadastro login do Colaborador</h4>

    <form action="../login/gLogin.php" method="post">

       Matricula:<br />
        <input type="text" name="matricula" /><br />

        Login:<br />
        <input type="text" name="login" /><br />

        Senha:<br />
        <input type="password" name="senha" /><br />

        Perfil:<br />
        <input type="radio" name="perfil" value="1" />Administrador
        <input type="radio" name="perfil" value="2" />Funcionario
        <br />

        <input type="submit" value="Enviar" />

    </form>
    
    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>

</body>

</html>