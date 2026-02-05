<?php
include 'header.php';
include 'ConnectionBD.php';
$libel = "";
$NcontiSelected = "";
// liste nationalités avec le nom du continent
$textereq = "SELECT n.num, n.libelle as 'natio_lib', c.libelle as 'conti_lib' FROM nationalite n, continent c WHERE n.numContinent = c.num";
if ($_GET)
{
    $libel = $_GET['libelle'];
    $NcontiSelected = $_GET['continent'];
    if ($libel != "")
    {
        $textereq.= " AND n.libelle LIKE '%".$libel."%'";
    }
    if ($NcontiSelected != "")
    {
        $textereq.= " AND c.num = ".$NcontiSelected;
    }
}
$textereq.= " ORDER BY n.libelle";
$req=$monPdo->prepare($textereq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$Nationalites=$req->fetchAll();
$tableclass = 0;

// liste Continents
$reqConti=$monPdo->prepare("SELECT * FROM continent");
$reqConti->setFetchMode(PDO::FETCH_OBJ);
$reqConti->execute();
$Continents=$reqConti->fetchAll();

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

<div class="row mt-4">

<form action="" method="get" class="container border border-primary bg-primary bg-opacity-10 p-5 col-md-6 rounded-4">
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Saisir une libellé" value="<?php if ($libel != "") {echo $libel;} ?>">
            <select name="continent" id="continent" class="form-select col-md-3">
                <option value="">Sélectionner un continent</option>
            <?php
                // Affichage des continents dans le select du formulaire de recherche
                foreach($Continents as $Continent){
                    if ($Continent->num == $NcontiSelected)
                        {
                            echo '<option value="'.$Continent->num.'" selected>'.$Continent->libelle.'</option>';
                        }
                    else
                        {
                            echo '<option value="'.$Continent->num.'">'.$Continent->libelle.'</option>';
                        }
                }
            ?>
        </select>
        <div class="row">
            <div class="col mt-3">
                <center><input style="width:50%" type="submit" class="btn btn-primary d-block px-4" value="Rechercher"></center>
            </div>
        </div>
    </div>
</form>

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
