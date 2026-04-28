<?php 
// Inclui a lógica que criamos acima
include_once "../deshbord/consulta_lucro.php"; 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Hotel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background: #f4f4f4;
    }

    .box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 700px;
        margin: auto;
    }
    </style>
</head>

<body>

    <div class="box">
        <h2>Lucro por Acomodação</h2>

        <form method="GET">
            <label>Selecione o Mês: </label>
            <select name="mes" onchange="this.form.submit()">
                <option value="01" <?php if($mes_filtro == '01') echo 'selected'; ?>>Janeiro</option>
                <option value="02" <?php if($mes_filtro == '02') echo 'selected'; ?>>Fevereiro</option>
                <option value="03" <?php if($mes_filtro == '03') echo 'selected'; ?>>Março</option>
                <option value="04" <?php if($mes_filtro == '04') echo 'selected'; ?>>Abril</option>
                <option value="05" <?php if($mes_filtro == '05') echo 'selected'; ?>>Maio</option>
                <option value="06" <?php if($mes_filtro == '06') echo 'selected'; ?>>Junho</option>
            </select>
        </form>

        <hr>

        <canvas id="meuGrafico"></canvas>
    </div>

    <script>
    const ctx = document.getElementById('meuGrafico').getContext('2d');

    // Passando os dados do MySQLi (PHP) para o Chart.js (JS)
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nomes_grafico); ?>,
            datasets: [{
                label: 'Total Arrecadado (R$)',
                data: <?php echo json_encode($valores_grafico); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <table>
        <?php include '../deshbord/cDeshbord.php' ?>
    </table>

</body>

</html>