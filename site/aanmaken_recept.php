<?php 
session_start();



require 'database.php';
$id = $_SESSION['id'];
    if(isset($_POST["submitButton"])){
        if(!empty($_POST["titel"]) && !empty($_POST["beschrijving"])){ 
           if(strlen($_POST["titel"]) >= 3){

               
               
               $naam = $_POST['titel'];
               $beschrijving = $_POST['beschrijving'];
               $moeilijksheidgraad = $_POST['moeilijksheidgraad'];
               $tijdsduur = $_POST['tijdsduur'];
               $menugang = $_POST['menugang'];
               // prepare sql and bind parameters
               $stmt = $conn->prepare("INSERT INTO Recepten (gerecht_naam, beschrijving, tijdsduur, menugang, moeilijksheidgraad, afbeelding, gebruiker_id)
                VALUES (:name, :beschrijving, :tijdsduur, :menugang, :moeilijksheidgraad, :afbeelding, :id)");
                
                require 'process_file_upload.php';


                $stmt->bindParam(':name', $naam);
                $stmt->bindParam(':beschrijving', $beschrijving);
                $stmt->bindParam(':moeilijksheidgraad', $moeilijksheidgraad);
                $stmt->bindParam(':tijdsduur', $tijdsduur);
                $stmt->bindParam(':menugang', $menugang);
                $stmt->bindParam(':afbeelding', $filename);
                $stmt->bindParam(':id', $id);
                $stmt->execute();          
                header("Location: aanmaken_ingredienten.php");

              
                
           } 
        } 
    }
  
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>recept Aanmaken</title>
</head>
<body>
<?php include 'header.php'; ?>
<main>
    <form action="" method="post" enctype='multipart/form-data'>
            <label for="" class="text-white">Recept Aanmaken</label>
            <input type="text" name="titel" id="titel" placeholder="Naam Gerecht">
            <input type="text" name="beschrijving" id="beschrijving" placeholder="Instructies/Beschijving">
            <input type="text" name="tijdsduur" id="tijdsduur" placeholder="Tijdsduur(In min Bijv. 12)">
            <input type="text" name="menugang" id="menugang" placeholder="Menugang">
            <label for="moeilijksheidgraad" class="text-white">Moeilijksheidgraad:</label>
            <select id="moeilijksheidgraad" name="moeilijksheidgraad">
                <option value="1">Heel Makkelijk</option>
                <option value="2">Eenvoudig</option>
                <option value="3">Gemiddeld</option> 
                <option value="4">Uitdagend</option> 
                <option value="5">Moeilijk</option> 
            </select><br>
            <input type='file' name='file' />
            <button type="submit" name="submitButton">Aanmaken!</button>
    </form>
</main>
<?php include 'footer.php'; ?>
</body>
</html>