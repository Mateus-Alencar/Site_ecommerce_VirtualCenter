<?php
session_start();

// Verifica se o usuário está logado
$response = array("loggedIn" => false);

if (isset($_SESSION['user_id'])) {
    $response["loggedIn"] = true;
}

echo json_encode($response);
?>
