<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>tache</title>
</head>
<body>
    <h2> Ajout de nouvelle tache </h2>
   <form action="nouvelletache.php" method="post"> 
    <table>
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
            <form action="nouvelletache.php" method="post"> 
                    <div class="txt_field">
                        <input type="text" name="nom" required>
                        <label>Nom</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="description" required>
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
                    <div class="txt_field">
                            
                    <select name="codeevent">
                <option value="">Select an Event</option>
                    <?php
                    include_once("connection.php");
                    $reqEvenements = $cx->query("SELECT * FROM evenement");
                    while ($evenement = $reqEvenements->fetch_array()) {
                        echo "<option value='" . $evenement['codeevent'] . "'>" . $evenement['nom'] . "</option>";
                    }
                    ?>
                </select>
                        
                    </div>
                    <div class="txt_field"><br><br>
                    <select name="membres[]" multiple>
                    <?php
                    $reqMembres = $cx->query("SELECT * FROM membre");
                    while ($membre = $reqMembres->fetch_array()) {
                        echo "<option value='" . $membre['codemem'] . "'>" . $membre['nom'] . " " . $membre['prenom'] . "</option>";
                    }
                    ?>
                </select>
                    </div>
                    <input type="submit" value="enregistrer"> 
                    <input type="reset" value="annuler">
            </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST["description"])) {
    $description = $_POST["description"];
    $dated = $_POST["dated"];
    $datef = $_POST["datef"];
    $nom = $_POST["nom"];
    $codeevent = $_POST["codeevent"];

    include_once("connection.php");

    $req = "INSERT INTO tache (nom, description, dated, datef, codeevent) VALUES ('$nom', '$description', '$dated', '$datef', '$codeevent')";
    
    $res = $cx->query($req);

    if ($res) {
        $idTache = $cx->insert_id;

        if (isset($_POST['membres']) && is_array($_POST['membres'])) {
            foreach ($_POST['membres'] as $idMembre) {
                $reqAffectation = "INSERT INTO tache_membre (idtache, idmembre) VALUES ('$idTache', '$idMembre')";
                $resAffectation = $cx->query($reqAffectation);

                if (!$resAffectation) {
                    echo "Erreur lors de l'affectation des membres à la tâche : " . $cx->error;
                    break;
                }
            }
        }

        echo "Ajout effectué avec succès!";
    } else {
        echo "Erreur lors de l'ajout de la tâche : " . $cx->error;
    }

    include_once("deconnection.php");
}
?>
