<?php 
require 'database.php';
session_start();
$id = $_GET['id'];  

if(isset($_POST["submitButton"])){
    if(!empty($_POST["naamIngredient"])) { 
        $naam = $_POST["naamIngredient"];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Ingredienten` SET `naam` = :name WHERE `Ingredienten`.`id` = :id");
        $stmt->bindParam(':name', $naam);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header('Location: ingredienten.php');
        exit();
    } 
}

$stmt = $conn->prepare("SELECT * FROM `Ingredienten` WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
  
// set the resulting array to associative
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
    <?php foreach ($ingredienten as $ingredient) : ?>
    <title><?php echo $ingredient['naam'] ?></title>
    <?php endforeach; ?>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="recepten-container">
        <div class="verandernaam"> 
            <form action="" method="post">
                <?php foreach ($ingredienten as $ingredient ) : ?> 
                <label for="">Naam ingredient</label>
                <input type="text" name="naamIngredient" id="naamIngredient" value="<?php echo $ingredient['naam']?>">
                <button class="detail-buttons" type="submit" name="submitButton">Verander de naam</button> 
                <?php endforeach; ?>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

