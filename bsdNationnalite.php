<?php
include 'header.php';
include 'ConnectionBD.php';
$action = $_GET['action'];
$libelle = $_POST['libelle'];
$continent = $_POST['continent'];
if ($action == 'modifier') {
    $num = $_POST['num'];   
    $req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent = :continent where num= :num");
    $req->bindParam(':num', $num );
}
else if ($action == 'ajouter') {
    $req=$monPdo->prepare("INSERT INTO nationalite(libelle, numContinent) VALUES(:libelle, :continent)");
}
$req->bindParam(':libelle', $libelle );
$req->bindParam(':continent', $continent );
$req->execute();
$message = $action == 'modifier' ? "modifiée" : "ajoutée";

if($req){
    $_SESSION['message'] = ["success" => "La nationalité a été ". $message];
} else { 
    $_SESSION['message'] = ["danger" => "La nationalité n'a pas été ". $message];
}                       

header('location: liste_Nationalites.php');
exit();
?>




<?php
include 'footer.php';  
?>
