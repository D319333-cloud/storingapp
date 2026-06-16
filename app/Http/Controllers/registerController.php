<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user_id']))
{
    die("Kan niet registreren - je bent al ingelogd");
}

$email = $_POST['email'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    die("Error: Dit is geen geldig e-mailadres!");
}

$password = $_POST['password'];
$password_check = $_POST['password_check'];
if($password !== $password_check)
{
    die("Wachtwoorden zijn niet gelijk!");
}

require_once '../../../config/conn.php';
$sql = "SELECT * FROM users WHERE username = :email";

$statement = $conn->prepare($sql);
$statement->execute([":email" => $email]);

if($statement->rowCount() > 0)
{
    die("Error: Dit account bestaat al!");
}

if(empty($password))
{
    die("Wachtwoord mag niet leeg zijn!");
}
$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $query = "INSERT INTO users (username, password, admin) VALUES (:email, :hash, 0)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ':email' => $email,
        ':hash' => $hash
    ]);

    header("Location: ../../../resources/views/login/index.php");
    exit;

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
