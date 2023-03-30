<?php
require 'database.php';

session_start();

$stmt = $conn->prepare("SELECT id,gerecht_naam, afbeelding FROM `Recepten`;");
$stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $recepten = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Recepten</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="recepten-container"> 
            <!--de if statement kijkt of iemand is ingelogt, alleen dat kan iemand een gerecht zelf maken -->
            <?php if(!empty($_SESSION)) : ?>
                <div>
                    <h2 class="submit-button"><a href="aanmaken_recept.php"><button type="submit" class="detail-buttons">Aanmaken</button></a></h2>
                </div>
            <?php endif; ?>
            <?php foreach ($recepten as $recept) : ?>
                    <div class="recepten-items">
                        <h1><?php echo $recept['gerecht_naam']?> </h1>
                        <img height="200px" width="100%" src="images/<?php echo $recept['afbeelding'] ?>" alt="een foto van <?php echo $recept['gerecht_naam'] ?>">
                        <a href="recept.php?id=<?php echo $recept["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
                    </div>
                <?php endforeach; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>