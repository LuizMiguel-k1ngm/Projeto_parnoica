<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "parnaoica";


$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
