<?php
// 1. Haak aan op de lopende sessie
session_start();

// 2. Vernietig de sessie (PHP vergeet alle inloggegevens)
session_destroy();

// 3. Stuur de gebruiker terug naar de openbare indexpagina
header("Location: index.php");
exit;
?>
