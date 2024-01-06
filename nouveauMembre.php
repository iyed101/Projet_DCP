<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nouveau Membre</title>
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
            <form action="nouveauMembre.php" method="post"> 
                    <div class="txt_field">
                        <input type="text" name="nom" required>
                        <label>Nom</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="prenom" required>
                        <label>Prenom</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="classe" required>
                        <label>Classe</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="adresse" required>
                        <label>Adresse</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="statut" required>
                        <label>Statut</label>
                    </div>
                    <div class="txt_field"><label>Date de naissance</label><br><br>
                        <input type="date" name="date" required>
                    </div>
                    <input type="submit" value="Enregistrer"> 
                    <input type="reset" value="Annuler">
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if(isset($_POST["nom"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $classe = $_POST["classe"];
    $adresse = $_POST["adresse"];
    $statut = $_POST['statut'];
    $date = $_POST['date'];

    include_once("connection.php");

    $req = "INSERT INTO membre (nom, prenom, classe, adresse, statut, date) VALUES ('$nom', '$prenom', '$classe', '$adresse', '$statut', '$date')";
    $res = $cx->query($req);

    if($res) {
        echo "Ajout effectue avec succes! ";
    } else {
        echo "Ajout n'a pas ete effectue. Erreur : " . $cx->error;
    }

    include_once("deconnection.php");
}
?>
