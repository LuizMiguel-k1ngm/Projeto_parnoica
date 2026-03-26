<?php
#consultar usuario

//parou aqui!!! 26/03/2026
        //testando se alguem pesquisou algo
        if (!empty($_GET["idCliente"])) {
            $idCliente = $_GET["idCliente"];

            include_once '../_config/conn.php';

            $sqli = "select * from parnaoica.cliente where cpf like '" . $cpf . "%'";

            $result = mysqli_query($con,$sqli);
            $totalregistros = mysqli_num_rows($result); //num de linhas

            if ($totalregistros > 0) {
                //echo "OK";
                ?>
                <table width="900px" border="1px">  
                    <tr>
                        <th>Id do cliente</th>
                        <th>Nome</th>
                        <th>cpf</th>
                        <th>email</th>
                        <th>Status</th>
                        <th>Editar</th>
                     <!--   <th>Excluir</th> -->
                    </tr>                                                
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        
                        <tr>
                            <td><?php echo $row["idFrigobar"] ?></td>
                            <td><?php echo $row["idAcomodacao"] ?></td>
                            <td><?php echo $row["fstatus"] ?></td>
                            <td><a href="../include/atualizar_frigobar.php?idFrigobar=<?php echo $row["idFrigobar"] ?>">...</a></td>
                           <!-- <td><a href="#" onclick="excluir(<?php echo $row["idFrigobar"] ?>)">X</a></td> -->
                        </tr>

                        <?php
                    }
                    //echo "</table>";
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




