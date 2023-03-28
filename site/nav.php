<link rel="stylesheet" href="css/style.css">
<nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="recepten.php">Recepten</a></li>
    <li><a href="ingredienten.php">Ingredienten</a></li>
    <?php if(empty($_SESSION)) : ?>
      <li><a href="inlog.php">Inloggen/Registreren</a></li>
    <?php endif; ?>
    <?php if(!empty($_SESSION)) : ?>
      <?php if($_SESSION['rol'] == "Developer" || $_SESSION['rol'] == "Projectleider" || $_SESSION['rol'] == "Begeleider") : ?>
        <li><a href="beheer_recepten.php">Beheer Recepten</a></li>
        <li><a href="beheer_gebruikers.php">Beheer Gebruikers</a></li>
      <?php endif; ?> 
      <li><a href="eigen-recepten.php"><?php echo $_SESSION['first_name']?> <?php echo $_SESSION['last_name']?></a></li>
      <li><a href="uitloggen.php">Uitloggen</a></li>
    <?php endif; ?>
  </ul>
</nav>
