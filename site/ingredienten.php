<?php require 'database.php';
session_start();
$stmt = $conn->prepare("SELECT * FROM `Ingredienten`");
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
    <title>Ingredienten</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="ingredienten-container">
            <?php foreach ($ingredienten as $ingredient) : ?>
                <div class="ingredienten">
                    <h1><?php echo $ingredient['naam']?> </h1>
                    <a href="ingredient.php?id=<?php echo $ingredient["id"] ?>"><button type="submit" class="detail-buttons">Verander naam</button></a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>