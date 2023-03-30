<?php
require 'database.php';

session_start();
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
    <main>
        <div class="specials_container">
            <?php if(empty($recepten)) : ?>
                <div class="labelvoorSpecial">
                    <h1>U heeft nog geen recepten gemaakt</h1>
                    <a href="aanmaken_recept.php"><button type="submit" class="detail-buttons">Aanmaken</button></a>
                </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($recepten)) : ?>
            <div class="eigen_recepten_container">
                <div class="eigen_recepten_items">
                    <h1>Uw gemaakte recepten:</h1>
                </div>
            </div>
            <div class="recepten-container">    
                <?php foreach ($recepten as $mijn_recepten) : ?>
                <div class="recepten-items">
                        <h1><?php echo $mijn_recepten['gerecht_naam']?> </h1>
                        <img height="200px" width="100%" src="Images/<?php echo $mijn_recepten['afbeelding'] ?>" alt="een foto van <?php echo $mijn_recepten['gerecht_naam'] ?>">
                        <a href="recept.php?id=<?php echo $mijn_recepten["id"] ?>"><button type="submit" class="detail-buttons">Klik hier voor meer details!</button></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
<?php include 'footer.php'; ?>