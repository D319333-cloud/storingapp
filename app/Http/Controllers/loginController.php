<?php
session_start();

// Haal de gegevens op uit het formulier
$username = $_POST['username'];
$password = $_POST['password'];

// Database verbinding erbij pakken (route aangepast aan deze map)
require_once '../../../config/conn.php';

// De SELECT-query met een placeholder voor de username
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([
    ':username' => $username
]);

// We verwachten één resultaat, dus we gebruiken fetch()
$user = $statement->fetch(PDO::FETCH_ASSOC);

// Check of het account bestaat
if($statement->rowCount() < 1)
{
    die("Error: account bestaat niet");
}

// Check of het wachtwoord klopt met de hash
if(!password_verify($password, $user['password']))
{
    die("Error: wachtwoord niet juist!");
}

// Sla het id op in de sessie. Je bent nu ingelogd!
$_SESSION['user_id'] = $user['id'];

// Stuur de gebruiker door naar de hoofdpagina van de app
header("Location: ../../../index.php");
exit;
?>
