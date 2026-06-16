<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    // Stuur gebruiker dan naar login via het relatieve pad (3 mappen terug vanaf deze controller)
    header("Location: ../../../public_html/resources/views/login/index.php?msg=" . urlencode($msg));
    exit; 
}

$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'] !== '' ? $_POST['capaciteit'] : null;
$melder = $_POST['melder'];
$type = $_POST['type'] ?? 'Onbekend';
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0;
$overige_info = $_POST['overige_info'] ?? null;

require_once '../../../config/config.php';
require_once '../../../config/conn.php';

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

header("Location: /storingapp/public_html/resources/views/meldingen/index.php");
exit;
?>
