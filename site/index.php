<?php
require 'database.php';
// Dit is het startpunt van je applicatie.


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="flex-container">
        <div class="flex-item">
            <h2>Welkom!</h2>
            <p>Welkom bij de homepage van het deze website! Klik op een van de knoppen hierboven, om naar een andere pagina te gaan.</p>
        </div>
        <div class="flex-item">
            <h2>Wat kan ik hier doen?</h2>
            <p>Op deze website zal u veel informatie vinden over verschillende Amerikaanse recepten. U kunt het stappenplan volgen om de gerechten zelf te maken. Ook kunt u exact zien hoelang het duurt om te maken, en hoe moeilijk het is. </p>
        </div>
        <div class="flex-item">
            <h2>Help ons met nieuwe recepten!</h2>
            <p>Wilt u uw recept delen met de wereld? dat kan ook! Maak nu een account aan om uw eigen recept te maken!</p>
        </div>
        <div class="homepageWelkom">
            <h1><b><i>Wij wensen u veel kookplezier!!!</i></b></h1>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
