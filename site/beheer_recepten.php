<?php
require 'database.php';

session_start();
if($_SESSION['rol'] != "Developer" && $_SESSION['rol'] != "Projectleider" &&  $_SESSION['rol'] != "Begeleider"){
    header("Location: index.php");
    exit;
}
$stmt = $conn->prepare("SELECT * FROM `Recepten`;");
$stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $recepten = $stmt->fetchAll();

    if(isset($_POST["deleteButton"])){
        $id = $_POST['receptID'];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("DELETE FROM Recepten WHERE id = :id");
        $stmt->bindParam(':id', $id);    
        $stmt->execute();
    }
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
    <div class="recepten-container">
        <div>
            <h2 class="submit-button"><a href="aanmaken_recept.php"><button type="submit" class="detail-buttons">Aanmaken</button></a></h2>
        </div>
        <?php foreach ($recepten as $recept) : ?>
            <div class="recepten-items">
                <h1><?php echo $recept['gerecht_naam']?> </h1>
                <img height="200px" width="100%" src="Images/<?php echo $recept['afbeelding'] ?>" alt="een foto van <?php echo $recept['gerecht_naam'] ?>">
                <a href="update_recept.php?id=<?php echo $recept["id"] ?>"><button type="submit" class="detail-buttons">Wijzigen</button></a>
                <form action="" method="post">
                <input type="hidden" name="receptID" value="<?php echo $recept['id'] ?>">
                <button type="submit" name="deleteButton" class="detail-buttons">Verwijderen</button></a>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    <?php include 'footer.php'; ?>