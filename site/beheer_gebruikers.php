<?php
require 'database.php';

session_start();
if($_SESSION['rol'] != "Developer" && $_SESSION['rol'] != "Projectleider" &&  $_SESSION['rol'] != "Begeleider"){
    header("Location: index.php");
    exit;
}
$stmt = $conn->prepare("SELECT * FROM `Gebruiker`;");
$stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $gebruikers = $stmt->fetchAll();

    if(isset($_POST["deleteButton"])){
        $id = $_POST['gebruikerID'];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("DELETE FROM Gebruiker WHERE id = :id");
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
    <title>beheer_gebruikers</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="gebruikers_container">
        <h2 class="submit-button"><a href="aanmaken_gebruiker.php"><button type="submit" class="">Gebruiker Aanmaken</button></a></h2>
        <?php foreach ($gebruikers as $gebruiker) : ?>
            <div class="gebruikers_items">
                <p>Voornaam: <?php echo $gebruiker['first_name']?> </p>
                <p>Achternaam: <?php echo $gebruiker['last_name']?> </p>
                <p>Email: <?php echo $gebruiker['email']?> </p>
                <p>Wachtwoord: <?php echo $gebruiker['password']?> </p>
                <p>Rol: <?php echo $gebruiker['rol']?> </p>
                <p>Geslacht: <?php echo $gebruiker['geslacht']?> </p>
                <a href="update_gebruiker.php?id=<?php echo $gebruiker['id'] ?>"><button type="submit" class="">Wijzigen</button></a><br>
                <form action="" method="post">
                    <input type="hidden" name="gebruikerID" value="<?php echo $gebruiker['id'] ?>">
                    <button type="submit" name="deleteButton" class="">Verwijderen</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    <?php include 'footer.php'; ?>