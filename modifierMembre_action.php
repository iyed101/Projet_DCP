<?php 

$code=$_POST["codemem"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$classe=$_POST["classe"];
$adresse=$_POST["adresse"];
$statut=$_POST["statut"];
$date=$_POST["date"];


include_once("connection.php");
$req = "UPDATE membre SET  nom='$nom', prenom='$prenom',classe='$classe',adresse='$adresse',statut='$statut',date='$date' WHERE codemem=$code";
$res=$cx->query($req);

if($res && $cx->affected_rows > 0) {echo "La modification a ete effectuee avec succes !";}
else echo"La modification n'a pas ete effectuee ";

include_once("deconnection.php");

?>