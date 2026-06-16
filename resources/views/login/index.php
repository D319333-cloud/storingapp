<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Inloggen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Inloggen</h1>

        <!-- Het formulier verwijst naar de map waar de loginController staat -->
        <form action="../../../app/Http/Controllers/loginController.php" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
