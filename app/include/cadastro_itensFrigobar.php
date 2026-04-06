<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro itens frigobar</title>
</head>
<body>

<h3>Cadastro Itens no Frigobar</h3>
    <form action="../frigobar/cFrigobar.php" method="get">
        Id do frigobar:
        <input type="number" step="1" patter="/d" min="1" max='13' name="idFrigobar" required>
        <input type="submit" value="Buscar">
    </form>

</body>
</html>