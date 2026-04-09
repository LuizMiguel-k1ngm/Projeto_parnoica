<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro acomodação</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>

    <h4>Cadastro Acomodação</h4>

    <form action="../acomodacao/gAcomodacao.php" method="post">
        Nome da acomodação:<br />
        <input type="text" name="nome" required /><br />

        Número da acomodação:<br />
        <input type="number" name="numero_quarto" required min='1' /><br />

        Capacidade:<br />
        <input type="number" name="capacidade" min="1" required /><br />

        Valor da Diária :<br />
        <input type="text" name="valor" id="valor_moeda" placeholder="0,00" required /><br />

        Tipo:<br />
        <input type="radio" name="tipoAcomodacao" value="suíte" checked />Suíte
        <input type="radio" name="tipoAcomodacao" value="apartamento" />Apartamento
        <br /><br />

    

        <input type="submit" value="Enviar" />
    </form>

    <script>
    $(document).ready(function() {
        $('#valor_moeda').mask('#.##0,00', {
            reverse: true
        });
    });
    </script>

</body>

</html>