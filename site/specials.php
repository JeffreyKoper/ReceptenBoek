<?php
require 'database.php';

session_start();

$stmt = $conn->prepare("SELECT * FROM `Recepten` WHERE tijdsduur = (SELECT MAX(tijdsduur) FROM Recepten)");
$stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $LangnaarKort = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT * FROM `Recepten` WHERE moeilijksheidgraad = (SELECT MIN(moeilijksheidgraad) FROM Recepten)");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $makkelijksteRecepten = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT * FROM `Recepten` WHERE aantal_ingredienten = (SELECT MAX(aantal_ingredienten) FROM Recepten);");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $AantalIngredienten = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Specials</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="specials_container">
        <div class="labelvoorSpecial">
            <h1 class="">Langstdurende recept(en):</h1>
        </div>
    </div>
    <div class="specials_container">
        <?php foreach ($LangnaarKort as $Langste) : ?>
            <div class="specials_items">
                <h1><?php echo $Langste['gerecht_naam']?> </h1>
                <img height="200px" width="100%" src="images/<?php echo $Langste['afbeelding'] ?>" alt="een foto van <?php echo $Langste['gerecht_naam'] ?>">
                <p><?php echo $Langste['tijdsduur']?> Minuten</p>
                <a href="recept.php?id=<?php echo $Langste["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="specials_container">
        <div class="labelvoorSpecial">
            <h1 class="">Makkelijkste Recept(en):</h1>
        </div>
    </div>
    <div class="specials_container">
        <?php foreach ($makkelijksteRecepten as $makkelijk) : ?>
            <div class="specials_items">
                <h1><?php echo $makkelijk['gerecht_naam']?> </h1>
                <img height="200px" width="100%" src="images/<?php echo $makkelijk['afbeelding'] ?>" alt="een foto van <?php echo $makkelijk['gerecht_naam'] ?>">
                <p><?php 
                    // de switch veranderd de Id nummer naar text voor de gebruiker om te lezen.
                    switch ($makkelijk['moeilijksheidgraad']) {
                        case 1:
                           echo 'Heel Makkelijk';
                            break;
                        case 2:
                           echo 'Eenvoudig';
                            break;
                        case 3:
                           echo 'Gemiddeld';
                            break;
                        case 4:
                           echo 'Uitdagend';
                            break;
                        case 5:
                           echo 'Moeilijk';
                            break;
                        
                        default:
                            echo 'geen moeilijkheidsgraad genoteerd';
                            break;
                    }
                ?></p>
                <a href="recept.php?id=<?php echo $makkelijk["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="specials_container">
        <div class="labelvoorSpecial">
            <h1 class="">Meeste aantal ingredienten:</h1>
        </div>
    </div>
    <div class="specials_container">
        <?php foreach ($AantalIngredienten as $aantal) : ?>
            <div class="specials_items">
                <h1><?php echo $aantal['gerecht_naam']?> </h1>
                <img height="200px" width="100%" src="images/<?php echo $aantal['afbeelding'] ?>" alt="een foto van <?php echo $aantal['gerecht_naam'] ?>">
                <p><?php echo $aantal['aantal_ingredienten']?> ingredienten</p>
                <a href="recept.php?id=<?php echo $aantal["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include 'footer.php'; ?>