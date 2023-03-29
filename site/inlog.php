<?php
require 'database.php';

session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM Gebruiker WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

    if(is_array($gebruiker) && count($gebruiker) > 0){
        // test wachtwoord
        if(isset($_POST["password"]) && !empty($password = $_POST["password"])){
            $password = $_POST['password'];
            if($gebruiker["password"] == $password){
                $_SESSION = $gebruiker;
                header("Location: index.php");
            }
            else {
                echo "Het email Adres of het wachtwoord is incorrect, probeer het opnieuw.";
            }

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
    <title>Inloggen</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="inlog-container">
        <div class="inlog-items">
            <form method="post">
                <div class="text-white">
                    <h2>Inloggen</h2>
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" placeholder="Password" name= "password">
                    <button type="submit" id="Submit"class="submit-button">Inloggen</button>
                    <h1>Nog geen account? <a href="registreer.php">Klik hier</a> om een account te maken!</h1>
                </div>
            </form>
            </div>
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>
