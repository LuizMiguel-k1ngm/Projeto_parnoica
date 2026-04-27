<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshbord</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div>
        <canvas id="myChart" style="height: 250px; width: 500px;"> </canvas>
    </div>
    <script>
        const ctx = document.getElementById('myChart');
        let acomodacao = ["SLP", "SPC", "SLA", "AP1", "AP2", "AP3", "AP4", "AP5", "AP6", "AP7", "AP8", "AP9", "AP10"];
        let valores = [5000, 6000, 8000, 3000, 2500, 2000, 3200, 4000, 2500, 3500, 3000, 2500, 3500];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: acomodacao,
                datasets: [{
                    label: 'VALOR',
                    data: valores,
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

    <form action="deshbord.php" method="get">

        <?php include_once "../deshbord/cDeshbord.php";
        ?>

    </form>


    <form action="deshbord.php">

    <?php  include_once "../deshbord/cProdutoDeshbord.php" ?>
    </form>




</body>

</html>