 <?php
    date_default_timezone_set("America/Sao_Paulo");
    include_once '../_config/conn.php';

    $idusuario = $_POST["idCliente"] ?? null;
    $idAcomodacao = $_POST["idAcomodacao"] ?? null;
    $data_checkin = $_POST["data_checkin"] ?? null;
    $data_checkout = $_POST["data_checkout"] ?? null;
    $n_clientes = $_POST["n_clientes"] ?? null;
    $r_status = 'PE';

    $idusuario = $_POST["idCliente"];
    $idAcomodacao = $_POST["idAcomodacao"];
    $data_checkin = $_POST["data_checkin"];
    $data_checkout = $_POST["data_checkout"];
    $n_clientes = $_POST["n_clientes"];
    $r_status = 'PE';
    $hora_checkin =   '11:00:00';
    $hora_checkout = '14:00:00';




    if (empty($data_checkin) || empty($data_checkout)) {
        echo "Escolha uma data válida";
        die();
    }


    $hora_checkin =   '11:00:00';
    $hora_checkout = '14:00:00';

    $data_atual = date('Y-m-d');
    $entrada = new DateTime($data_checkin);
    $saida = new DateTime($data_checkout);


    $dias = $entrada->diff($saida);
    $quantidade_dias = $dias->days;



    $sql_filtro = "SELECT idReserva FROM parnaoica.reserva 
               WHERE idAcomodacao = '$idAcomodacao' 
               AND ('$data_checkin' < data_checkout AND '$data_checkout' > data_checkin)";


    $resultado_filtro = mysqli_query($con, $sql_filtro);



    $sql_filtro_valor = "SELECT * FROM parnaoica.acomodacao 
               WHERE idAcomodacao = '$idAcomodacao' ";

    $resultado_valor_acomodacao_filtro = mysqli_query($con, $sql_filtro_valor);
    $valor_acomodacao = mysqli_fetch_assoc($resultado_valor_acomodacao_filtro);
    $row_valor_acomodacao = $valor_acomodacao['valor'];

    $valor_total_pago = ($row_valor_acomodacao * $n_clientes) * $quantidade_dias;


    $sql_filtro_estacionamento = "SELECT idEstacionamento from parnaoica.estacionamento
                              WHERE idAcomodacao = '$idAcomodacao'";

    $resultado_valor_estacionamento = mysqli_query($con, $sql_filtro_estacionamento);
    $valor_estacionamento = mysqli_fetch_assoc($resultado_valor_estacionamento);
    $idEstacionamento = $valor_estacionamento['idEstacionamento'];


    if ($data_checkin < $data_atual) {
        echo "A data de check-in deve ser posterior a data atual";
    } else if ($saida <= $entrada) {
        echo "A data de check-out deve ser posterior a data de check-in";
    } else if (mysqli_num_rows($resultado_filtro) > 0) {
        echo ("Desculpe!Esta acomodação já está ocupada no período selecionado.");
    } else if ($n_clientes > 2) {
        echo "número de clientes excedeu o limite da acomodação!";
    } else {

        $sqli = "INSERT INTO reserva(idReserva, idusuario, idEstacionamento, idAcomodacao, data_checkin, data_checkout, n_clientes, valor_total_pago, rstatus, hora_checkin, hora_checkout)

     VALUES(null, '$idusuario', '$idEstacionamento','  $idAcomodacao', '$data_checkin', '$data_checkout', '$n_clientes', '$valor_total_pago', '$r_status', '$hora_checkin', '$hora_checkout')";


        if (mysqli_query($con, $sqli)) {
            echo "Gravado com sucesso! <br>";
            echo  "Valor Total: R$ " . number_format($valor_total_pago, 2, ',', '.');
        } else {
            echo "Erro ao gravar!";
        }
    }


    mysqli_close($con);

    ?>
 <br>
 <a href="../colaborador/painel.php">Painel de Controle</a>
 <br>
 <a href="../include/cadastro_reserva.php">Registrar outra reserva</a>
 <br>
 <a href="../include/sair.php">Sair</a>