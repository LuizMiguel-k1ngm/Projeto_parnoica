<?php
<<<<<<< HEAD
date_default_timezone_set("America/Sao_Paulo");
=======

//precisa filtrar as datas que irão 

if (!empty($_GET["cpf"])) {
    $cpf = $_GET["cpf"];

    include_once '../_config/conn.php';

    //transformar o cpf em idUsuario 
    $sql_idusuario = "SELECT idusuario FROM cliente WHERE cpf = $cpf";
    $query_idusuario = mysqli_query($con, $sql_idusuario);
    $idusuario = mysqli_fetch_assoc($query_idusuario);
    $row = $idusuario['idusuario'];
>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4

if (!empty($_GET["cpf"])) {
    $cpf = $_GET["cpf"];
    include_once '../_config/conn.php';

<<<<<<< HEAD
 $data_atual = date ('Y-m-d');   

    $sqli = "SELECT c.nome, c.cpf, c.email, c.telefone, 
                    r.idReserva, r.data_checkin, r.data_checkout, 
                    a.nome AS nome_acomodacao
             FROM cliente c
             INNER JOIN reserva r ON c.idusuario = r.idusuario
             INNER JOIN acomodacao a ON r.idAcomodacao = a.idAcomodacao
             WHERE c.cpf = '$cpf'  and r.data_checkin = '$data_atual' and rstatus = 'PE'";

    $result = mysqli_query($con, $sqli);
    $totalregistros = mysqli_num_rows($result); 

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
    </tr>
    <?php
            while ($row = mysqli_fetch_array($result)) {
                $idReserva = $row["idReserva"]; 
            ?>
    <tr>
        <td><?php echo $row["nome"] ?></td>
        <td><?php echo $row["cpf"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["telefone"] ?></td>
        <td><?php echo $row["idReserva"] ?></td>
        <td><?php echo $row["nome_acomodacao"] ?></td>
        <td><?php echo date('d/m/Y', strtotime($row["data_checkin"]))?></td>
        <td><?php echo date('d/m/Y', strtotime($row["data_checkout"])) ?></td>
    </tr>
    <?php } ?>
</table>
=======
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
>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4
<?php
        echo "Total de registros: " . $totalregistros;
    } else {
        echo "Nenhum cliente encontrado!";
    }
<<<<<<< HEAD
=======

    mysqli_close($con);
>>>>>>> 7425bc655d049640369a0dc9a3ddaee4db2c01a4
}
?>