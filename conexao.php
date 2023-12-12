<?php
$hostname = "localhost";
$bancodedados = "site_virtual_center";
$usuario = "root";
$senha = "";

// Criar uma conexão global
global $mysqli;

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verificar a conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
} else {
    echo "Conexão realizada com sucesso";
}
?>