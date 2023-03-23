<?php 
require 'database.php';

$id = $_GET['id'];  

$sql = "SELECT * FROM `Recepten` WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$recept = $stmt->fetchAll();
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
    <div class="recepten-container">
            <div class="details">        
                <?php foreach ($recept as $receptDetails) : ?>   
                    <h1 class="center"><?php echo $receptDetails["gerecht_naam"] ?></h1>
                    <img height="400px" width="650px" src="<?php echo $receptDetails['afbeelding'] ?>" alt="een foto van <?php echo $receptDetails['gerecht_naam'] ?>">
                    <p><?php echo $receptDetails['beschrijving'] ?></p>
                <?php endforeach; ?>
            </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

