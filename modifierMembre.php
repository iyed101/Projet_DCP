<?php
include_once("connection.php");

$memberId = isset($_GET['id']) ? $_GET['id'] : 0;

$req = "SELECT * FROM membre WHERE codemem = $memberId";
$res = $cx->query($req);

if ($res) {
    $l = $res->fetch_array();
} else {
    die("Query failed: " . $cx->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Modifier Membre</title>
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
            <form action="modifierMembre_action.php" method="post">
                    <div class="txt_field">
                        <input type="text" name="codemem" value="<?php echo $l['codemem']; ?>" readonly>
                        
                    </div>
                    <div class="txt_field">
                    <input type="text" name="nom" value="<?php echo $l['nom']; ?>">
                    </div>
                    
                    <div class="txt_field">
                    <input type="text" name="prenom" value="<?php echo $l['prenom']; ?>">
                    </div>
                    <div class="txt_field">
                    
                    <input type="text" name="classe" value="<?php echo $l['classe']; ?>">
                    </div>
                    <div class="txt_field">
                    
                    <input type="text" name="adresse" value="<?php echo $l['adresse']; ?>">
                    </div>

                    <div class="txt_field">
                    
                    <input type="text" name="statut" value="<?php echo $l['statut']; ?>" >
                    </div>
                    <div class="txt_field">
                    
                    <input type="date" name="date" value="<?php echo $l['date']; ?>">
                    </div>
                    <input type="submit" value="Modifier"> 
                    <input type="reset" value="annuler">
            </form>
            </div>
        </div>

        </div>
</body>
</html>
