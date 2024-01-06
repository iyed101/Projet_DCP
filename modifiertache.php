<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Modifier Tâche</title>
</head>
<body>

<?php
include_once("connection.php");


if(isset($_GET['id'])){
    $idTache = $_GET['id'];

    
    $reqTache = $cx->query("SELECT * FROM tache WHERE idtache = $idTache");

    if ($tache = $reqTache->fetch_array()) {
?>

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
            <form action="traitementModifTache.php" method="post">
                    <div class="txt_field">
                    <input type="hidden" name="idtache" value="<?php echo $idTache; ?>" readonly>
                    </div>
                    <div class="txt_field">
                    <td><input type="text" name="nom" value="<?php echo $tache['nom']; ?>"></td>
                    </div>
                    
                    <div class="txt_field">
                    <input type="text" name="description" value="<?php echo $tache['description']; ?>">
                    </div>
                    <div class="txt_field">
                    <input type="date" name="dated" value="<?php echo $tache['dated']; ?>">
                    </div>
                    <div class="txt_field">
                    <input type="date" name="datef" value="<?php echo $tache['datef']; ?>">
                    </div>



                    <div class="txt_field">
                    <select name="codeevent">
                <option value="">Select an Event</option>
                    <?php
                      $reqEvenements = $cx->query("SELECT * FROM evenement");
                        while ($evenement = $reqEvenements->fetch_array()) {
                        $selected = ($evenement['codeevent'] == $tache['codeevent']) ? 'selected' : '';
                        echo "<option value='" . $evenement['codeevent'] . "' $selected>" . $evenement['nome'] . "</option>";
                        }
                        ?>
                    </select>
                    </div>



                    <div class="txt_field">
                    <select name="membres[]" multiple>
                            <?php
                            $reqMembres = $cx->query("SELECT * FROM membre");
                            while ($membre = $reqMembres->fetch_array()) {
                                $selected = ''; 
                                $reqMembresTache = $cx->query("SELECT * FROM tache_membre WHERE idtache = $idTache AND idmembre = " . $membre['codemem']);
                                if ($reqMembresTache->num_rows > 0) {
                                    $selected = 'selected';
                                }

                                echo "<option value='" . $membre['codemem'] . "' $selected>" . $membre['nom'] . " " . $membre['prenom'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <input type="submit" value="Enregistrer les modifications">
                    <input type="reset" value="annuler">
            </form>
            </div>
        </div>

        </div>
</body>
<?php
    } else {
        echo "Tâche non trouvée.";
    }
} else {
    echo "ID de la tâche non spécifié.";
}

include_once("deconnection.php");
?>

</body>
</html>
