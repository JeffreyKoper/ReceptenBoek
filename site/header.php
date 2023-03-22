<?php 
    require 'database.php';

  
    $stmt = $conn->prepare("SELECT COUNT(id) as totaalRecepten FROM `Recepten`");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $aantalRecepten = $stmt->fetch();

    var_dump($aantalRecepten)
  
?>

<link rel="stylesheet" href="css/style.css">
<header>
  <h1>Amerikaans Receptenboek <div class="floatRechts">  Totaal Aantal Recepten: <?php echo $aantalRecepten['totaalRecepten'] ?></div> </h1>
</header>
