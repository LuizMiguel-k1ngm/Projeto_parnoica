<?php
include_once "../deshbord/consulta_lucro.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Hotel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="box" id="desh">
        <h2>Lucro por Acomodação</h2>

        <form method="GET">
            <label>Selecione o Mês: </label>
            <select name="mes" onchange="this.form.submit()">
                <option value="01" <?php if ($mes_filtro == '01') echo 'selected'; ?>>Janeiro</option>
                <option value="02" <?php if ($mes_filtro == '02') echo 'selected'; ?>>Fevereiro</option>
                <option value="03" <?php if ($mes_filtro == '03') echo 'selected'; ?>>Março</option>
                <option value="04" <?php if ($mes_filtro == '04') echo 'selected'; ?>>Abril</option>
                <option value="05" <?php if ($mes_filtro == '05') echo 'selected'; ?>>Maio</option>
                <option value="06" <?php if ($mes_filtro == '06') echo 'selected'; ?>>Junho</option>
                <option value="06" <?php if ($mes_filtro == '07') echo 'selected'; ?>>Julho</option>
                <option value="06" <?php if ($mes_filtro == '08') echo 'selected'; ?>>Agosto</option>
                <option value="06" <?php if ($mes_filtro == '09') echo 'selected'; ?>>Setembro</option>
                <option value="06" <?php if ($mes_filtro == '10') echo 'selected'; ?>>Outubro</option>
                <option value="06" <?php if ($mes_filtro == '11') echo 'selected'; ?>>Novembro</option>
                <option value="06" <?php if ($mes_filtro == '12') echo 'selected'; ?>>Dezembro</option>
            </select>
        </form>

        <hr>

        <canvas id="meuGrafico" ></canvas>
    </div>

    <script>
        const ctx = document.getElementById('meuGrafico').getContext('2d');


        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nomes_grafico); ?>,
                datasets: [{
                    label: 'Total Arrecadado por acomodação (R$)',
                    data: <?php echo json_encode($valores_grafico); ?>,
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
    <br><br>

    <table>
        <?php include '../deshbord/consulta_item.php' ?>
    </table>


    <table>
        <?php include '../deshbord/cDeshbord.php' ?>
    </table>


    <br>

    <a href="../colaborador/painel.php">Página Inicial</a><br>
    <a href="sair.php">Sair</a><br>

</body>



</html>