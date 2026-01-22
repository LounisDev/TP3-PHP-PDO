<?php
include 'header.php';
include 'ConnectionBD.php';
$libelle = $_POST['libelle'];
$num = $_POST['num'];

$req=$monPdo->prepare("update nationalite set libelle = :libelle where num= :num");
$req->bindParam(':libelle', $libelle );
$req->bindParam(':num', $num );
$req->execute();
$Nationalites=$req->fetchAll();

if($req){
    echo "<div class='container alert alert-success text-center p-3 mt-3 col-md-3'>La nationalité a été modifiée </div>";
    echo '<a href="liste_Nationalites.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>';
} else { 
    echo "<div class='container alert alert-danger text-center p-3 mt-3 col-md-3'>La nationalité n'a pas été modifiée</div>";
}

?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
