<?php 
require 'database.php';

session_start();

$id = $_GET['id'];  

// Haalt een specieke recept op met behulp van id
$sql = "SELECT * FROM `Recepten` WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recept = $stmt->fetchAll();

// veranderd de Ingredient.id zodat ipv id nummers, de naam in beeld krijg.
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
    <main>
        <div class="recept-container">
                <div class="details">        
                    <?php foreach ($recept as $receptDetails ) : ?>   
                        <h1 class="center"><?php echo $receptDetails["gerecht_naam"] ?></h1>
                        <img height="400px" width="100%" src="Images/<?php echo $receptDetails['afbeelding'] ?>" alt="een foto van <?php echo $receptDetails['gerecht_naam'] ?>">
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
                        <p><?php echo $receptDetails['tijdsduur'] ?> Minuten</p>
                        <h2>Menugang:</h2>
                        <p><?php echo $receptDetails['menugang'] ?>
                        <h2>moeilijkheidsniveau:</h2>
                        <p><?php 
                    // met een switch statement komt de juiste moeilijksheidgraad op zijn plek, ipv van een getal.
                    switch ($receptDetails['moeilijksheidgraad']) {
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
                    <!--Checkt of de gebruiker dat ingelogd is, het recept heeft gemaakt. zo ja, dan kan deze gebruiker zijn/haar recept aanpassen -->
                    <?php if(!empty($_SESSION)) : ?>
                        <?php if($_SESSION['id'] == $receptDetails['gebruiker_id']) : ?>
                            <h2>Updaten</h2>
                            <a href="update_recept.php?id=<?php echo $receptDetails["id"] ?>">Update Recept</a></td>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>

