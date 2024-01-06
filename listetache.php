<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Liste des Taches</title>
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
include_once("connection.php");


$reqTaches = $cx->query("SELECT t.*, e.nome AS nom_evenement FROM tache t
                        LEFT JOIN evenement e ON t.codeevent = e.codeevent");




echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Date debut</th>
        <th>Date fin</th>
        <th>evenement</th>
        <th>Membres affectes</th>
        <th>Option</th>
      </tr>";

while ($tache = $reqTaches->fetch_array()) {
    echo "<tr>
            <td>" . $tache['idtache'] . "</td>
            <td>" . $tache['nom'] . "</td>
            <td>" . $tache['description'] . "</td>
            <td>" . $tache['dated'] . "</td>
            <td>" . $tache['datef'] . "</td>
            <td>" . $tache['nom_evenement'] . "</td>";

    $reqMembresTache = $cx->query("SELECT m.nom, m.prenom FROM membre m
                                  JOIN tache_membre tm ON m.codemem = tm.idmembre
                                  WHERE tm.idtache = " . $tache['idtache']);
    
    echo "<td>";
    while ($membreTache = $reqMembresTache->fetch_array()) {
        echo $membreTache['nom'] . " " . $membreTache['prenom'] . "<br>";
    }
    echo "</td>";

   echo "<td>
          <a href='modifiertache.php?id=".$tache['idtache']."'>Modifier</a>
          <a href='supprtache.php?id=".$tache['idtache']."'>Supprimer</a>
        </td>";

    echo "</tr>";
}

echo "</table>";

include_once("deconnection.php");
?>
<?php include_once("deconnection.php"); ?>
        </div>
    </div >






</body>
</html>
