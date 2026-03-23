<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> Cadastro do estacionamento</h1>
 <form action="../colaborador/gColaborador.php" method="post">
            
            Login:<br/>
            <input type="text" name="login" /><br/>
            
            Senha:<br/>
            <input type="password" name="senha"/><br/>
            
            Perfil:<br/>
            <input type="radio" name="perfil" value="1"/>Administrador
            <input type="radio" name="perfil" value="2"/>Funcionario
            <br/>
            
            <input type="submit" value="Enviar" />
            
        </form>



    
</body>
</html>