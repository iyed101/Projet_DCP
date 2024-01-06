<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="topbar">
            <div class="logo">
                <h2><a href="indexx.php">Cyber robot.</a></h2>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="indexmembre.php">
                        <i class="fas fa-user"></i>
                        <div >gestion des membres</div>
                    </a>
                </li>
                <li>
                    <a href="indexevenement.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div >gestion des evenements</div>
                    </a>
                </li>
                <li>
                    <a href="indextache.php">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <div >gestion des taches</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="center">
            <h1>Nouveau Membre</h1>
            <form action="nouveauevenement.php" method="post"> 
                    <div class="txt_field">
                        <input type="text" name="nom">
                        <label>Nom</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="description">
                        <label>description</label>
                    </div>
                    <div class="txt_field">
                        <label>date debut</label><br><br>
                        <input type="date" name="dated">
                    </div>
                    <div class="txt_field">
                        <label>date fin</label><br><br>
                        <input type="date" name="datef">
                    </div>
                    <input type="submit" value="enregistrer"> 
                    <input type="reset" value="annuler">
            </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $dated = $_POST["dated"];
    $datef = $_POST["datef"];

    include_once("connection.php");

    $req = "INSERT INTO evenement (nome, description, dated, datef) VALUES ('$nom', '$description', '$dated', '$datef')";
    
    $res = $cx->query($req);

    if ($res) {
        echo "Enregistrement de l evenement effectue avec succes!";
    } else {
        echo "Erreur lors de l enregistrement de l evenement : " . $cx->error;
    }

    include_once("deconnection.php");
}
?>

