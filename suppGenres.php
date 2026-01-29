<?php
include 'header.php';
include 'ConnectionBD.php';
$num = $_GET['num'];

$req=$monPdo->prepare("delete from genre where num= :num");
$req->bindParam(':num', $num );
$req->execute();
;

if($req){
    $_SESSION['message'] = ["success" => "Le genre a été supprimé"];
} else { 
    $_SESSION['message'] = ["danger" => "Le genre n'a pas été supprimé"];
}

header('location: liste_Genres.php');
exit();
?>



<?php
include 'footer.php';  
?>
 