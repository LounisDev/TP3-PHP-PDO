<?php
include 'header.php';
include 'ConnectionBD.php';
$num = $_GET['num'];

$req=$monPdo->prepare("delete from nationalite where num= :num");
$req->bindParam(':num', $num );
$req->execute();
;

if($req){
    $_SESSION['message'] = ["success" => "La nationalité a été supprimée"];
} else { 
    $_SESSION['message'] = ["danger" => "La nationalité n'a pas été supprimée"];
}
header('location: liste_Nationalites.php');
exit();
?>




<?php
include 'footer.php';  
?>
 