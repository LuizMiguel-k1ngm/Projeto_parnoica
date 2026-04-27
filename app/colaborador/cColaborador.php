<?php
if (!empty($_GET["idCargo"])) {
    $idCargo = $_GET["idCargo"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.funcionario where idCargo like '" . $idCargo . "%'";


    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); 

    if ($totalregistros > 0) {
       
?>
<table width="900px" border="1px">
    <tr>


        <th>ID</th>

        <th>Nome</th>
        <th>cpf</th>
        <th>telefone</th>
        <th>Email</th>
        <th>Status</th>



        <th>Editar</th>

    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>



    <tr>

        <td><?php echo $row["idFuncionario"] ?></td>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>

        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["status"] ?></td>
        <td><a href="../include/atualizar_colaborador.php?idFuncionario=<?php echo $row["idFuncionario"] ?>">...</a>
        </td>


    </tr>

    <?php
            }

            ?>
</table>
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum colaborador encontrado!";
    }

    mysqli_close($con);
}
?>