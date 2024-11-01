<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'acesso';

$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_errno) {
    echo "Falha ao conectar ao MySQL: " . $mysqli->connect_error;
    exit();
} else {
    echo "Conexão efetuada com sucesso";
}
?>