<?php
require 'database.php';
SESSION_START();

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
    <?php include 'nav.php'; ?>
    <div class="recepten-container">
        <?php foreach ($recepten as $recept) : ?>
            <div class="recepten-items">
                <h1><?php echo $recept['gerecht_naam']?> </h1>
                <img height="200px" width="200px" src="<?php echo $recept['afbeelding'] ?>" alt="een foto van <?php echo $recept['gerecht_naam'] ?>">
                <button type="submit" class="detail-buttons"><a href="recept.php?id=<?php echo $recept["id"] ?>">Klik hier voor meer details!</a></button>
            </div>
        <?php endforeach; ?>
        </div>
    <?php include 'footer.php'; ?>