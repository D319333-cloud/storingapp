<?php require_once __DIR__.'/../../../config/config.php'; ?>

<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/public_html\img\logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/resources/views/meldingen/index.php">Meldingen</a>
        </nav>
        <div>
            <?php 
            // Check of het user_id is ingesteld in de sessie (Opdracht 11.9, punt 2c)
            if(isset($_SESSION['user_id'])): 
            ?>
                <!-- Gebruiker is ingelogd: toon Uitloggen -->
                <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
            <?php else: ?>
                <!-- Gebruiker is NIET ingelogd: toon Inloggen -->
                <a href="<?php echo $base_url; ?>/resources/views/login/index.php">Inloggen</a>
            <?php endif; ?>
        </div>
    </div>
</header>
