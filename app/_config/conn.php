<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "parnaoica";

// Remova o @ para podermos ver o erro real se falhar
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>