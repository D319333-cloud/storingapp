<?php
session_start();

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

require_once '../../../config/conn.php';

$query = "SELECT * FROM users WHERE username = :username";

/** @var PDO $conn */
$statement = $conn->prepare($query);

$statement->execute([
    ":username" => $username
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
    die("Error: account bestaat niet");
}

if(!password_verify($password, $user['password']))
{
    die("Error: wachtwoord niet juist!");
}

$_SESSION['user_id'] = $user['id'];
header("Location: ../../../index.php");
exit;