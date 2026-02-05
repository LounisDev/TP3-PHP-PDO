<?php
include 'header.php';
include 'ConnectionBD.php';
$action = $_GET['action'];
if ($action == 'modifier') {
    $num = $_GET['num']; 
    $req=$monPdo->prepare("SELECT * FROM nationalite WHERE num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $Nationalite=$req->fetch();
}

// liste Continents avec select pour le formulaire
    $reqConti=$monPdo->prepare("SELECT * FROM continent");
    $reqConti->setFetchMode(PDO::FETCH_OBJ);
    $reqConti->execute();
    $Continents=$reqConti->fetchAll();

?>
<div class="container text-primary text-center bg-primary bg-opacity-10 mt-5 p-5 rounded-4">
    <?php if ($action == 'ajouter') 
        echo "<h1>Ajout d'une nationalité</h1>";
    else
        echo "<h1>Modification d'une nationalité</h1>";
    ?>
</div>

<form action="bsdNationnalite.php?action=<?php echo $action; ?>" method="post">
    <div class="mb-3 container mt-5 col-md-3">
        <label for="libelle" class="form-label">Libellé de la nationalité</label>
        <input type="text" class="form-control" id="libelle" name="libelle" value ="<?php if ($action == 'modifier') {echo $Nationalite->libelle;} ?>">
    <hr>
    <div>
        <label for="continent" class="form-label">Libellé du continent</label>
        <br>
        <center>
        <select name="continent" id="continent" class="form-select col-md-3">
            <?php
                foreach($Continents as $Continent){
                    if ($Continent->num == $Nationalite->numContinent)
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
        </center>
    </div>
    </div>
    <input type="hidden" id="num" name="num" value ="<?php if ($action == 'modifier') {echo $Nationalite->num;} ?>"/>
    <div class="container text-center mb-5">
        <button type="submit" class="<?php if ($action == 'modifier') {echo "btn btn-info btn-lg";} else {echo "btn btn-success btn-lg";} ?>"> <i class="fa-solid fa-plus"></i> <?php if ($action == 'modifier') {echo "Modifier la nationalité";} else {echo "Ajouter la nationalité";} ?></button>
        <a href="liste_Nationalites.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>
    </div>

</form>

<?php
include 'footer.php';  
?>
