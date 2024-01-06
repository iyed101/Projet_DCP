<?php

$cri = $_POST["critere"];
$val = $_POST["valeur"];
include_once("connection.php");

$req = $cx->query("SELECT t.*, e.nome AS nom_evenement FROM tache t
                        LEFT JOIN evenement e ON t.codeevent = e.codeevent   WHERE $cri = '$val'");
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Liste des Membres</title>
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
        <?php
if ($req && $cx->affected_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><td>id tache</td><td>Nom</td><td>description</td><td>date debut</td><td>date fin</td><td>evenement</td><td>membre</td><td>Option</td></tr>";

    while ($l = $req->fetch_array()) {
        echo "<tr>";
        echo "<td>" . $l['idtache'] . "</td>";
        echo "<td>" . $l['nom'] . "</td>";
        echo "<td>" . $l['description'] . "</td>";
        echo "<td>" . $l['dated'] . "</td>";
        echo "<td>" . $l['datef'] . "</td>";
        echo "<td>".$l['nom_evenement']."</td>";

        $reqMembresTache = $cx->query("SELECT m.nom, m.prenom FROM membre m
        JOIN tache_membre tm ON m.codemem = tm.idmembre
        WHERE tm.idtache = " . $l['idtache']);

        echo "<td>";
        while ($membreTache = $reqMembresTache->fetch_array()) {
            echo $membreTache['nom'] . " " . $membreTache['prenom'] . "<br>";
        }
        echo "</td>";

        echo "<td>
                <a href='modifiertache.php?id=" . $l['idtache'] . "'>Modifier</a>
                <a href='supprtache.php?id=" . $l['idtache'] . "'>Supprimer</a>
            </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune tâche correspondante trouvée.";
}
?>
        </div>
    </div>



<?php
include_once("deconnection.php");
?>
