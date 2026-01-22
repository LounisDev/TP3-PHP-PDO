<?php
include 'header.php';
include 'ConnectionBD.php';
$libelle = $_POST['libelle'];

$req=$monPdo->prepare("INSERT INTO genre(libelle) VALUES(:libelle)");
$req->bindParam(':libelle', $libelle );
$req->execute();
$Genres=$req->fetchAll();

if($req){
    echo "<div class='container alert alert-success text-center p-3 mt-3 col-md-3'>Le genre a été ajouté </div>";
} else { 
    echo "<div class='container alert alert-danger text-center p-3 mt-3 col-md-3'>Le genre n'a pas été ajouté</div>";
}

?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>