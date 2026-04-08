<?php
if (!empty($_GET["idCargo"])) {
    $idCargo = $_GET["idCargo"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.funcionario where idCargo like '" . $idCargo . "%'";

<<<<<<< HEAD


=======
>>>>>>> eec2b8580dfd4d1ee5c7358764fa9442dfe24032
    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); //num de linhas

    if ($totalregistros > 0) {
       
?>
<table width="900px" border="1px">
    <tr>
<<<<<<< HEAD
        <th>Id</th>
=======
        <th>Id do Funcionario</th>
>>>>>>> eec2b8580dfd4d1ee5c7358764fa9442dfe24032
        <th>Nome</th>
        <th>cpf</th>
        <th>telefone</th>
        <th>Email</th>
        <th>Status</th>
<<<<<<< HEAD

=======
>>>>>>> eec2b8580dfd4d1ee5c7358764fa9442dfe24032
        <th>Editar</th>
        <!--   <th>Excluir</th> -->
    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>



    <tr>

        <td><?php echo $row["idFuncionario"] ?></td>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>
<<<<<<< HEAD
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["email"] ?></td>

        <td><?php echo $row["cStatus"] ?></td>
        <td><a href="../include/atualizar_colaborador.php?idFuncionario=<?php echo $row["idFuncionario"] ?>">...</a></td>
=======
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["status"] ?></td>
        <td><a href="../include/atualizar_colaborador.php?idusuario=<?php echo $row["idFuncionario"] ?>">...</a></td>
>>>>>>> eec2b8580dfd4d1ee5c7358764fa9442dfe24032
        <!-- <td><a href="#" onclick="excluir(<?php echo $row["idFrigobar"] ?>)">X</a></td> -->
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