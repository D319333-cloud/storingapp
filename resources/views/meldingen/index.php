<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">(hier komen de storingsmeldingen)</div>
        <div class="meldingen-overzicht">
            <?php
            require_once '../../../config/conn.php';
            $query = "SELECT *FROM meldingen";
            $statement = $conn->prepare($query);
            $statement->execute();
            $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($meldingen as $melding){?>
                <h1><?php echo $melding['attractie']; ?>
                <h1><?php echo $melding['type']; ?>
                <h1><?php echo $melding['capaciteit']; ?>
                <h1><?php echo $melding['prioriteit']; ?>
                <h1><?php echo $melding['melder']; ?>
                <h1><?php echo $melding['overige_info']; ?>

            <?php } ?>
        </div>
    </div>

</body>

</html>
