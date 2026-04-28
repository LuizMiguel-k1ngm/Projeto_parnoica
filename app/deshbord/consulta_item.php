<?php
include_once "../_config/conn.php";
$cStatus = "A";

$sqli = "select i.nome, sum(cf.quantidade) as quantidade,  i.valor as unidade, sum(cf.total)
 as total from consumo_frigobar as cf
 inner join itens i on cf.idItens = i.idItens
 group by cf.idItens 
order by total desc";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); 

    if ($totalregistros > 0) {
       
?>
<table width="500px" border="1px">

    <caption>Consulta: Itens mais vendidos</caption>
    <tr>
        <th>Item</th>
        <th>Unidade</th>
        <th>Qte.</th>
        <th>Total</th>

    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

    <tr>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["unidade"] ?></td>
        <td><?php echo $row["quantidade"] ?></td>
        <td><?php echo $row["total"] ?></td>
    </tr>

    <?php
            }

            ?>
</table>
<?php
       
    } else {
        echo "Nenhum Produto encontrado";
    }

    

?>