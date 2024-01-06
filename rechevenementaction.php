<?php
$cri=$_POST["crit"];
$val=$_POST["val"];
include_once("connection.php");
$req = "SELECT * FROM evenement WHERE $cri = '$val'";
$res = $cx->query($req);
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
if ($res->num_rows > 0) {
   $l=$res->fetch_array();
    echo "<table border='1'>";
    echo "<tr><th>code evenement</th><th>nom evenement</th><th>date debut</th><th>date fin</th><th>Option</th></tr>";
    echo "<tr>"; 
    echo "<td>".$l['codeevent']."</td>";
     echo "<td>".$l['nome']."</td>";
     echo "<td>".$l['dated']."</td>";
     echo "<td>".$l['datef']."</td>";
     echo "<td>
    <a href='modifevenement.php?id=".$l['codeevent']."'>Modifier</a>
    <a href='suppevenement.php?id=".$l['codeevent']."'>Supprimer</a>
    </td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "l evenement n existe pas";
}
?>
        </div>
    </div>

<?php
include_once("deconnection.php");
?>
