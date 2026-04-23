<?php

if (!empty($_GET["data_inicial"]) && !empty($_GET['data_final'])) {
    $data_inicial = $_GET["data_inicial"];
    $data_final = $_GET['data_final'];

    include_once '../_config/conn.php';

    if($data_inicial > $data_final){
        echo "Erro: A data inicial não pode ser maior que a data final";
        exit();
    }



    $sqli = "SELECT c.nome, r.data_checkin, 
                    a.numero_quarto, a.tipoAcomodacao, a.capacidade, a.aStatus, a.valor
             FROM cliente AS c
             INNER JOIN reserva r ON c.idusuario = r.idusuario
             INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
             WHERE r.data_checkin BETWEEN '$data_inicial' AND '$data_final'";

    $result = mysqli_query($con, $sqli);

    if ($result && mysqli_num_rows($result) > 0) {
        $totalregistros = mysqli_num_rows($result);
?>
<table width="900px" border="1px">
    <tr>
        <th>Hóspede</th>
        <th>N° quarto</th>
        <th>Tipo</th>
        <th>Capacidade</th>
        <th>Status</th>
        <th>Valor</th>
        <th>Editar</th>
    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
    <tr>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["numero_quarto"] ?></td>
        <td><?php echo $row["tipoAcomodacao"] ?></td>
        <td><?php echo $row["capacidade"] ?></td>
        <td><?php echo $row["aStatus"] ?></td>
        <td>R$ <?php echo number_format($row["valor"], 2, ',', '.') ?></td>
        <td><a href="../include/atualizar_acomodacao.php?numero_quarto=<?php echo $row["numero_quarto"] ?>">...</a></td>
    </tr>
    <?php
            }
            ?>
</table>
<?php
        echo "Total de registros: " . $totalregistros;




    } else {
        echo "Nenhuma reserva encontrada para este período!";
    }
    

    mysqli_close($con);
}
?>