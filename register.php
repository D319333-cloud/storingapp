<?php session_start(); ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Registreren</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container">
        <h1>Registreren</h1>

        <?php if(isset($_GET['msg'])): ?>
            <div class="msg"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <form action="app/Http/Controllers/registerController.php" method="POST">

            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" name="email" id="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password_check">Wachtwoord herhalen:</label>
                <input type="password" name="password_check" id="password_check" class="form-input" required>
            </div>

            <input type="submit" value="Registeren">

        </form>
    </div>

</body>
</html>
