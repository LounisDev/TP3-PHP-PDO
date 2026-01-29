<?php
include 'header.php';
include 'ConnectionBD.php';
$req=$monPdo->prepare("SELECT n.num, n.libelle as 'natio_lib', c.libelle as 'conti_lib' FROM nationalite n, continent c WHERE n.numContinent = c.num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$Nationalites=$req->fetchAll();
$tableclass = 0;
?>

<div class="container text-primary text-center bg-primary bg-opacity-10 mt-5 p-5 rounded-4">
    <h1>Liste des nationalités</h1>
</div>
 
<?php   
if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    foreach ($message as $cle => $message) {
        echo '<div class="alert container alert-dismissible alert-'.$cle.' mt-4 text-center">'. $message .'
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
    }
    $_SESSION['message'] = [];
}
?>

<div class="container text-center mt-3 mb-3">
    <a href="formNationnalite.php?action=ajouter" class="btn btn-primary btn-lg"><i class="fa-solid fa-plus"></i> Ajouter une nationalité</a>
</div>

<table class="container table table-hover p-5 mt-5">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-2">Libellé</th>
      <th scope="col" class="col-md-2">Continent</th>
      <th scope="col" class="col-md-2">Actions</th>
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
            echo '<td>'.$Nationalite->natio_lib.'</td>';
            echo '<td>'.$Nationalite->conti_lib.'</td>';
            echo '<td>
                    <a href="formNationnalite.php?num='.$Nationalite->num.'&action=modifier" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#modalSupp" data-bs-toggle="modal" data-message="Voulez-vous vraiment supprimer cette nationalité ?" data-supp=suppNationnalite.php?num='.$Nationalite->num.' class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
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


<?php
include 'footer.php';  
?>
