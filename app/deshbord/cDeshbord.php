<?php
include_once "../_config/conn.php";
$cStatus = "A";

$sqli = "select * from parnaoica.cliente where cStatus like '" . $cStatus . "%'";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); //num de linhas

    if ($totalregistros > 0) {
       
?>
<table width="900px" border="1px">

    <caption>Consulta: cliente ativos</caption>
    <tr>
        <th>Id do cliente</th>
        <th>Nome</th>
        <th>cpf</th>
        <th>email</th>
        <th>telefone</th>
       
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

?>
