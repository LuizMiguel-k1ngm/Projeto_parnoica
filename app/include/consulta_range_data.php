<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3>Relatório de datas: cliente</h3>

<form action="consulta_range_data.php" method="get">

data inicial: <br> <input type="date" name="data_inicial" required>
<br><br>
data final: <br> <input type="date"  name="data_final" required>
<br><br>
<input type="submit">
</form>



    
<a href="../colaborador/painel.php">Página Inicial</a><br>
<a href="sair.php">Sair</a><br>


<?php 
include_once "../relatorio/range_data.php"
?>

</body>
</html>