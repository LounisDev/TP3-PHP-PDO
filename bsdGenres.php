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
    $_SESSION['message'] = ["success" => "Le genre a été ". $message];
} else { 
    $_SESSION['message'] = ["danger" => "Le genre n'a pas été ". $message];
}
header('location: liste_Genres.php');
exit();
?>




<?php
include 'footer.php';  
?>
