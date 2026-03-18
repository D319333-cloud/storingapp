<?php

// Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'] !== '' ? $_POST['capaciteit'] : null;
$melder = $_POST['melder'];
$type = $_POST['type'] ?? 'Onbekend';
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'] ?? null;

// Verbinding
require_once '../../../config/conn.php';

// Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) 
VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";

// Prepare
$statement = $conn->prepare($query);

// Execute
$statement->execute([
    ':attractie' => $attractie,
    ':type' => $type,
    ':capaciteit' => $capaciteit,
    ':prioriteit' => $prioriteit,
    ':melder' => $melder,
    ':overige_info' => $overige_info
]);

// Redirect terug naar overzicht
header("Location: /storingapp/resources/views/meldingen/index.php");
exit;