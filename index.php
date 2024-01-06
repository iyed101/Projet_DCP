<?php
session_start(); 



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    if ($username == "cyberobot" && $password == "admin2024") {
        $_SESSION['username'] = $username;
        header("location:indexx.php");
        exit();
    } else {
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="title"><span>Connexion</span></div>
            <form action="index.php" method="post">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="row button">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
    
</body>
</html>
