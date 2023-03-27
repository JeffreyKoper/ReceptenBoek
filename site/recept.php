<?php 
require 'database.php';

SESSION_START();

$id = $_GET['id'];  

$sql = "SELECT * FROM `Recepten` WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recept = $stmt->fetchAll();


$sql = "SELECT * FROM `Recept_Ingredienten`
JOIN Ingredienten ON Ingredienten.id = `ingredienten.id` WHERE `recept.id` =  :id"
;
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$ingredienten = $stmt->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php foreach ($recept as $receptDetails) : ?>
    <title><?php echo $receptDetails['gerecht_naam'] ?></title>
    <?php endforeach; ?>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="recept-container">
            <div class="details">        
                <?php foreach ($recept as $receptDetails ) : ?>   
                    <h1 class="center"><?php echo $receptDetails["gerecht_naam"] ?></h1>
                    <img height="400px" width="650px" src="<?php echo $receptDetails['afbeelding'] ?>" alt="een foto van <?php echo $receptDetails['gerecht_naam'] ?>">
                <?php endforeach; ?>
                <h2>Benodigheden/ingredienten:</h2>
                <?php foreach ($ingredienten as $ingredient ) : ?>  
                    <p><?php echo $ingredient['hoeveelheid'] ?> <?php echo $ingredient['naam'] ?> <?php if($ingredient['verplicht'] == 1) : ?> * <?php endif;?></p>
                <?php endforeach; ?>
                <p>* = Verplicht, zonder = optioneel</p>
                <h2>Recept:</h2>
                <?php foreach ($recept as $receptDetails ) : ?>   
                    <p><?php echo $receptDetails['beschrijving'] ?></p>
                    <h2>Tijdsduur:</h2>
                    <p><?php echo $receptDetails['tijdsduur'] ?>
                    <h2>Menugang:</h2>
                    <p><?php echo $receptDetails['menugang'] ?>
                    <h2>moeilijkheidsniveau:</h2>
                    <p><?php echo $receptDetails['moeilijksheidgraad'] ?>
                <?php endforeach; ?>
            </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

