<?php
require 'database.php';

SESSION_START();
$id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT id,gerecht_naam, afbeelding FROM `Recepten` WHERE gebruiker_id = '$id'");
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
    <title>Mijn Recepten</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="recepten-container">
        <?php if(empty($recepten)) : ?>
        <div class="">
            <h1 class="">U heeft nog geen recepten gemaakt</h1>
        </div>
        <?php endif; ?>
        <?php if(!empty($recepten)) : ?>
            <?php foreach ($recepten as $mijn_recepten) : ?>
                <div class="recepten-items">
                    <h1><?php echo $mijn_recepten['gerecht_naam']?> </h1>
                    <img height="200px" width="200px" src="<?php echo $mijn_recepten['afbeelding'] ?>" alt="een foto van <?php echo $mijn_recepten['gerecht_naam'] ?>">
                    <a href="recept.php?id=<?php echo $mijn_recepten["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
                </div>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
    <?php include 'footer.php'; ?>