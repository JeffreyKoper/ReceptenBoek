<?php 
session_start();
require 'database.php';
    if(isset($_POST["submitButton"])){
        $recept_id = $_POST['recept_id'];
        $ingredient = $_POST['ingredienten'];
        $hoeveelheid = $_POST['hoeveelheid'];
        $verplicht = $_POST['verplicht'];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO Recept_Ingredienten (`recept.id`, `ingredienten.id`, hoeveelheid, verplicht) VALUES (:recept_id, :ingredienten, :hoeveelheid, :verplicht)");
        $stmt->bindParam(':recept_id', $recept_id);
        $stmt->bindParam(':ingredienten', $ingredient);
        $stmt->bindParam(':hoeveelheid', $hoeveelheid);
        $stmt->bindParam(':verplicht', $verplicht);
        $stmt->execute();          
        //header("Location: http://localhost/aanmaken_ingredienten.php");
                    
    }
    if(isset($_POST["ingredientButton"])){
        $Nieuwingredient = $_POST['nieuwIngredient'];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO Ingredienten (naam) VALUES (:ingredient_naam)");
        $stmt->bindParam(':ingredient_naam', $Nieuwingredient);
        $stmt->execute();          
        //header("Location: http://localhost/aanmaken_ingredienten.php");
                    
    }  
$stmt = $conn->prepare("SELECT * FROM Ingredienten");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$ingredienten = $stmt->fetchAll();

$id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT * FROM Recepten WHERE gebruiker_id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

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
    <title>ingredienten toevoegen</title>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
    <form action="" method="post">
            <label for="" class="text-white">Ingredienten toevoegen</label>
            <select id="recept" name="recept_id">
            <?php foreach($recepten as $recept) : ?>
                <option value="<?php echo $recept['id'] ?>"><?php echo $recept['gerecht_naam'] ?></option>
            <?php endforeach; ?>
            </select>
            <select id="ingredient" name="ingredienten">
            <?php foreach($ingredienten as $ingredienten_id) : ?>
                <option value="<?php echo $ingredienten_id['id'] ?>"><?php echo $ingredienten_id['naam'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="hoeveelheid" id="hoeveelheid" placeholder="Hoeveelheid bijv. 10 gram, 1 handvol">
            <select id="verplicht" name="verplicht">
                <option value="0">niet verplicht</option>
                <option value="1">verplicht</option>
            </select>
            <button type="submit" name="submitButton">Toevoegen!</button>
            <h3 class="text-white">Staat uw ingredient er niet tussen? zet het hieronder en klik vervolgens op de knop om het aan de lijst toe te voegen!</h3>
            <input type="text" name="nieuwIngredient" id="nieuwIngredient" placeholder="Nieuw ingredient">
            <button type="submit" name="ingredientButton">ingredient Toevoegen!</button>
        </form>
        
<?php include 'footer.php'; ?>
</body>
</html>