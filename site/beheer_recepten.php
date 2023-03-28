<?php
require 'database.php';

SESSION_START();

$stmt = $conn->prepare("SELECT * FROM `Recepten`;");
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
    <title>beheer_recepten</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="recepten-container">
        <h2 class="submit-button"><a href="aanmaken_recept.php"><button type="submit" class="">Aanmaken</button></a></h2>
        <?php foreach ($recepten as $recept) : ?>
            <div class="recepten-items">
                <h1><?php echo $recept['gerecht_naam']?> </h1>
                <img height="200px" width="200px" src="<?php echo $recept['afbeelding'] ?>" alt="een foto van <?php echo $recept['gerecht_naam'] ?>">
                <a href="update_recept.php?id=<?php echo $recept["id"] ?>"><button type="submit" class="">Weizigen</button></a>
                <a href="recept.php?id=<?php echo $recept["id"] ?>"><button type="submit" class="">Verwijderen</button></a>
            </div>
        <?php endforeach; ?>
        </div>
    <?php include 'footer.php'; ?>