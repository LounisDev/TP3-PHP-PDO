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
    </div>
    <input type="hidden" id="num" name="num" value ="<?php if ($action == 'modifier') {echo $Nationalite->num;} ?>"/>
    <div class="container text-center mb-5">
        <button type="submit" class="<?php if ($action == 'modifier') {echo "btn btn-info btn-lg";} else {echo "btn btn-success btn-lg";} ?>"> <i class="fa-solid fa-plus"></i> <?php if ($action == 'modifier') {echo "Modifier la nationalité";} else {echo "Ajouter la nationalité";} ?></button>
        <a href="liste_Nationalites.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
