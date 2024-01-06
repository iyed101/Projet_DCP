<?php
include_once("connection.php");


    $idMembre = $_GET["id"];

    // Assurez-vous que $idMembre est un entier

        $idMembre = intval($idMembre);

        // Suppression du membre avec l'id spécifié
        $req = "DELETE FROM membre WHERE codemem = $idMembre LIMIT 1";
        $res = $cx->query($req);

        if ($res) {
            echo "Suppression effectuée avec succès!";
        } else {
            echo "Erreur lors de la suppression du membre : " . $cx->error;
        }
    
    

include_once("deconnection.php");
?>
