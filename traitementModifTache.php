<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idtache = $_POST["idtache"];
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $dated = $_POST["dated"];
    $datef = $_POST["datef"];
    $code=$_POST["codeevent"];
    if (isset($_POST["membres"])) {
        $membres = $_POST["membres"];
    } else {
        $membres = array();
    }
    

    include_once("connection.php");

    
    $reqModifTache = "UPDATE tache SET nom='$nom', description='$description', dated='$dated', datef='$datef',codeevent='$code' WHERE idtache=$idtache";

    if ($cx->query($reqModifTache)) {
        
        $reqSuppAffectations = "DELETE FROM tache_membre WHERE idtache=$idtache";
        $cx->query($reqSuppAffectations);

        
        foreach ($membres as $idmembre) {
            $reqAffectation = "INSERT INTO tache_membre (idtache, idmembre) VALUES ($idtache, $idmembre)";
            $cx->query($reqAffectation);
        }

        echo "Modification de la tâche effectuée avec succès!";
    } else {
        echo "Erreur lors de la modification de la tâche : " . $cx->error;
    }

    $cx->close();
} else {
    echo "Requête non autorisée.";
}
?>
