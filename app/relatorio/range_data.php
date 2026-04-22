<?php
if (!empty($_GET["data_inicial"])  && !empty($_GET['data_final'])) {
    $data_inicial = $_GET["data_inicial"];
    $data_final = $_GET['data_final'];

    include_once '../_config/conn.php';

    $sqli = "select c.nome, c.data_nascimento, c.cpf, c.email, r.idAcomodacao, r.data_checkin from cliente as c
inner join reserva r on c.idusuario = r.idusuario where data_checkin between = '.$data_inicial." % ' and  data_checkout = ' . $data_final . "%'";
    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); //num de linhas


    if ($totalregistros > 0) {
        //echo "OK";
?>
        <table width="900px" border="1px">
            <tr>
                <th>Nome</th>
                <th>N° quarto</th>
                <th>Tipo Acomodação</th>
                <th>Capacidade</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Editar</th>
                <!--    <th>Excluir</th> -->
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
                    <td><?php echo $row["valor"] ?></td>
                    <td><a href="../include/atualizar_acomodacao.php?numero_quarto=<?php echo $row["numero_quarto"] ?>">...</a></td>
                    <!--    <td><a href="../acomodacao/eAcomodacao.php" onclick="excluir(<?php echo $row["numero_quarto"] ?>)">X</a></td> -->
                </tr>

            <?php
            }
            //echo "</table>";
            ?>
        </table>
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhuma acomodação encontrada!";
    }

    mysqli_close($con);
}
