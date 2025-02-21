<?php 
session_start();
require 'database.php';
    $id = $_GET['id'];
    if(isset($_POST["submitButton"])){
        if(!empty($_POST["titel"]) && !empty($_POST["beschrijving"])){ 
           if(strlen($_POST["titel"]) >= 3){
                $naam = $_POST['titel'];
                $beschrijving = $_POST['beschrijving'];
                $moeilijksheidgraad = $_POST['moeilijksheidgraad'];
                $tijdsduur = $_POST['tijdsduur'];
                $menugang = $_POST['menugang'];
                // prepare sql and bind parameters
                $stmt = $conn->prepare("UPDATE Recepten SET gerecht_naam = :name, beschrijving = :beschrijving, tijdsduur = :tijdsduur, menugang = :menugang, moeilijksheidgraad = :moeilijksheidgraad WHERE id = :id");
                $stmt->bindParam(':name', $naam);
                $stmt->bindParam(':beschrijving', $beschrijving);
                $stmt->bindParam(':moeilijksheidgraad', $moeilijksheidgraad);
                $stmt->bindParam(':tijdsduur', $tijdsduur);
                $stmt->bindParam(':menugang', $menugang);
                $stmt->bindParam(':id', $id);
                $stmt->execute();          
                header("Location: eigen-recepten.php");
                
           } 
        } 
    }
   
    $stmt = $conn->prepare("SELECT * FROM Recepten WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  
    // set the resulting array to associative
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
    <title>update recept</title>
</head>
<body>
<?php include 'header.php'; ?>
<main>
    <form action="" method="post">
        <?php foreach($recept as $eigen_recept) : ?>
            <label for="" class="text-white">Update Recept</label>
            <input type="text" name="titel" id="titel" value="<?php echo $eigen_recept['gerecht_naam']?>">
            <input type="text" name="beschrijving" id="beschrijving" value="<?php echo $eigen_recept['beschrijving']?>">
            <input type="text" name="tijdsduur" id="tijdsduur" value="<?php echo $eigen_recept['tijdsduur']?>">
            <input type="text" name="menugang" id="menugang" value="<?php echo $eigen_recept['menugang']?>">
            <select id="moeilijksheidgraad" name="moeilijksheidgraad">
                <option value="1">Heel Makkelijk</option>
                <option value="2">Eenvoudig</option>
                <option value="3">Gemiddeld</option> 
                <option value="4">Uitdagend</option> 
                <option value="5">Moeilijk</option> 
            </select><br>
            <button type="submit" name="submitButton">Update!</button>
        <?php endforeach; ?>
        <h1 class="text-white">ingredient toevoegen? klik hieronder!</h1>
        <a href="aanmaken_ingredienten.php"><input type="button" value="Ingredienten toevoegen! "></a>
    </form>
    </main>
<?php include 'footer.php'; ?>
</body>
</html>