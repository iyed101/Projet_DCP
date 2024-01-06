<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idtache = $_GET['id'];

    include_once("connection.php");

    
    $reqSuppTache = "DELETE FROM tache WHERE idtache = $idtache";
    
    if ($cx->query($reqSuppTache)) {
        $reqSuppAffectations = "DELETE FROM tache_membre WHERE idtache = $idtache";
        $cx->query($reqSuppAffectations);

        echo "Suppression de la tâche effectuée avec succès!";
    } else {
        echo "Erreur lors de la suppression de la tâche : " . $cx->error;
    }

    $cx->close();
} else {
    echo "Requête non autorisée ou ID de la tâche non spécifié.";
}
?>
