<?php
include 'header.php';
include 'ConnectionBD.php';
$req=$monPdo->prepare("SELECT * FROM nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$Nationalites=$req->fetchAll();
$tableclass = 0;
?>
<div class="container text-primary text-center bg-primary bg-opacity-10 mt-5 p-5 rounded-4">
    <h1>Liste des nationalités</h1>
</div>

<table class="container table table-hover p-5 mt-5">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col" class="col-md-3">Numéro</th>
      <th scope="col" class="col-md-3">Libellé</th>
      <th scope="col" class="col-md-3">Actions</th>
    </tr>
  </thead>
    <tbody>
        <?php
        foreach($Nationalites as $Nationalite){
            if ($tableclass == 0) {
                echo '<tr class="table-light text-center">';
            }
            else {
                echo '<tr class="table-secondary text-center">';
            }
            echo '<td>'.$Nationalite->num.'</td>';
            echo '<td>'.$Nationalite->libelle.'</td>';
            echo '<td>
                    <a href="" class="btn btn-info btn-sm">Modifier</a>
                    <a href="" class="btn btn-danger btn-sm">Supprimer</a>
                  </td>';
            echo '</tr>';
        
            if ($tableclass == 0) {
                $tableclass++;
            }
            else {
                $tableclass--;
            }
        }
        ?>
  <tbody>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
