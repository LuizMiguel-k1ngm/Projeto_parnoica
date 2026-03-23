<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <h4>Cadastro de Colaborador</h4>
        
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
        
        <?php
        ,
        // put your code here
        ?>
    </body>
</html>
