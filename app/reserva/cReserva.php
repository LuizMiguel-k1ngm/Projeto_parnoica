<?php

//precisa filtrar as datas que irão 

if (!empty($_GET["cpf"])) {
    $cpf = $_GET["cpf"];

    include_once '../_config/conn.php';

    //transformar o cpf em idUsuario 
    $sql_idusuario = "SELECT idusuario FROM cliente WHERE cpf = $cpf";
    $query_idusuario = mysqli_query($con, $sql_idusuario);
    $idusuario = mysqli_fetch_assoc($query_idusuario);
    $row = $idusuario['idusuario'];


    // $sqli = "select * from parnaoica.cliente where cpf like '" . $cpf . "%'";

    $sqli = "select * from reserva
     inner join cliente on reserva.idusuario =  '" .$row . "'";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); //num de linhas


    if ($totalregistros > 0) {

?>
        <table width="900px" border="1px">
            <tr>
                <th>Nome</th>
                <th>cpf</th>
                <th>email</th>
                <th>telefone</th>
                <th>reserva</th>
                <th>acomodação</th>
                <th>data check-in</th>
                <th>data check-out</th>
                <!--   <th>Excluir</th> -->
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

                <tr>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo $row["cpf"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["telefone"] ?></td>
                    <td><?php // echo $row["reserva"] ?></td>
                    <td><?php // echo $row["acomodacao"] ?></td>
                    <td><?php // echo $row["data checkin"] ?></td>
                    <td><?php // echo $row["data checkou"] ?></td>

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