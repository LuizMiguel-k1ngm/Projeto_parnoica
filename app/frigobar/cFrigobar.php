<?php

if (!empty($_GET["fstatus"])) {
    $fstatus = $_GET["fstatus"];

    include_once '../_config/conn.php';

    $sqli = "select * from frigobar where fstatus like '" . $fstatus . "%'";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); 

    if ($totalregistros > 0) {
        
?>
<table width="900px" border="1px">
    <tr>
        <th>Id do Frigobar</th>
        <th>Id da acomodação</th>
        <th>Status</th>
        <th>Editar</th>

    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

    <tr>
        <td><?php echo $row["idFrigobar"] ?></td>
        <td><?php echo $row["idAcomodacao"] ?></td>
        <td><?php echo $row["fstatus"] ?></td>
        <td><a href="../include/atualizar_frigobar.php?idFrigobar=<?php echo $row["idFrigobar"] ?>">...</a></td>

    </tr>

    <?php
            }
           
            ?>
</table>
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum frigobar encontrado!";
    }

    mysqli_close($con);
}
?>