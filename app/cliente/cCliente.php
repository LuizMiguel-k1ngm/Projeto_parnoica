<?php

if (!empty($_GET["cStatus"])) {
    $cStatus = $_GET["cStatus"];

    include_once '../_config/conn.php';

    $sqli = "select * from parnaoica.cliente where cStatus like '" . $cStatus . "%'";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); //num de linhas

    if ($totalregistros > 0) {
       
?>
<table width="900px" border="1px">
    <tr>
        <th>Id do cliente</th>
        <th>Nome</th>
        <th>cpf</th>
        <th>email</th>
        <th>telefone</th>
        <th>Status</th>
        <th>Editar</th>
        <!--   <th>Excluir</th> -->
    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

    <tr>
        <td><?php echo $row["idusuario"] ?></td>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["cStatus"] ?></td>
        <td><a href="../include/atualizar_clientes.php?idusuario=<?php echo $row["idusuario"] ?>">...</a></td>
        <!-- <td><a href="#" onclick="excluir(<?php echo $row["idFrigobar"] ?>)">X</a></td> -->
    </tr>

    <?php
            }

            ?>
</table>
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum cliente encontrado!";
    }

    mysqli_close($con);
}
?>