<?php
include 'header.php';
include 'ConnectionBD.php';
$num = $_GET['num'];

$req=$monPdo->prepare("delete from genre where num= :num");
$req->bindParam(':num', $num );
$req->execute();
;

if($req){
    echo "<div class='container alert alert-success text-center p-3 mt-3 col-md-3'> Le genre a été supprimée</div>";
} else { 
    echo "<div class='container alert alert-danger text-center p-3 mt-3 col-md-3'> Le genre n'a pas été supprimée</div>";
}
echo '<a href="liste_Genres.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>';
?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
 