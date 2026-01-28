<?php
include 'header.php';
include 'ConnectionBD.php';
$action = $_GET['action'];
$libelle = $_POST['libelle'];
if ($action == 'modifier') {
    $num = $_POST['num'];
    $req=$monPdo->prepare("update genre set libelle = :libelle where num= :num");
    $req->bindParam(':num', $num );
}
else if ($action == 'ajouter') {
    $req=$monPdo->prepare("INSERT INTO genre(libelle) VALUES(:libelle)");
}
$req->bindParam(':libelle', $libelle );
$req->execute();
$message = $action == 'modifier' ? "modifiée" : "ajoutée";

if($req){
    echo "<div class='container alert alert-success text-center p-3 mt-3 col-md-3'> Le genre a été ". $message . "</div>";
} else { 
    echo "<div class='container alert alert-danger text-center p-3 mt-3 col-md-3'> Le genre n'a pas été ". $message . "</div>";
}
echo '<a href="liste_Genres.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>';
?>




<?php
include 'footer.php';  
?>
