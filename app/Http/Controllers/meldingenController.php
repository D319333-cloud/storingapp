<?php
// 1. Start of haak aan op sessie (Kernbegrip 17)
session_start();

// 2. Als de waarde user_id niet (!) is ingesteld in de session (Kernbegrip 17)
if(!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    // Stuur gebruiker dan naar login via het relatieve pad (3 mappen terug vanaf deze controller)
    header("Location: ../../../public_html/resources/views/login/index.php?msg=" . urlencode($msg));
    exit; // Stop hier met code uitvoeren (Kernbegrip 17)
}

// 3. De rest van de controller (Variabelen vullen en database)
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'] !== '' ? $_POST['capaciteit'] : null;
$melder = $_POST['melder'];
$type = $_POST['type'] ?? 'Onbekend';
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'] ?? null;

// Bestanden inladen (3 mappen terug)
require_once '../../../config/config.php';
require_once '../../../config/conn.php';

// Query uitvoeren
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) 
VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";

$statement = $conn->prepare($query);
$statement->execute([
    ':attractie' => $attractie,
    ':type' => $type,
    ':capaciteit' => $capaciteit,
    ':prioriteit' => $prioriteit,
    ':melder' => $melder,
    ':overige_info' => $overige_info
]);

// Redirect terug naar het overzicht via het juiste webpad
header("Location: /storingapp/public_html/resources/views/meldingen/index.php");
exit;
?>
