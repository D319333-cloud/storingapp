<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

 <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
                <input type="text" name="attractie" id="attractie" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <!-- hier komt een dropdown -->
                <label for="type">Type:</label>
                <select name="type" id="type" class="form-input" required>
                    <option value="">-- Kies type --</option>
                    <option value="Achtbaan">Achtbaan</option>
                    <option value="Draaiende attractie">Draaiende attractie</option>
                    <option value="Kinderattractie">Kinderattractie</option>
                    <option value="Restaurant, cafe, etc">Restaurant, cafe, etc</option>
                    <option value="Parkshow">Parkshow</option>
                    <option value="Waterattractie">Waterattractie</option>
                    <option value="Overig">Overig</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>

            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit"> Melding met de prioriteit</label>

              <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
                <input type="text" name="melder" id="melder" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="overige_info">Overige info:</label>
                <input type="text" name="overige_info" id="overige_info" class="form-input">
            </div>

            <input type="submit" value="Verstuur melding">

