<?php
include 'header.php';
include 'ConnectionBD.php';
$action = $_GET['action'];
if ($action == 'modifier') {
    $num = $_GET['num']; 
    $req=$monPdo->prepare("SELECT * FROM genre WHERE num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $Genre=$req->fetch();
}
?>
<div class="container text-primary text-center bg-primary bg-opacity-10 mt-5 p-5 rounded-4">
    <?php if ($action == 'ajouter') 
        echo "<h1>Ajout d'un genre</h1>";
    else
        echo "<h1>Modification d'un genre</h1>";
    ?>
</div>

<form action="bsdGenres.php?action=<?php echo $action; ?>" method="post">
    <div class="mb-3 container mt-5 col-md-3">
        <label for="libelle" class="form-label">Libellé du genre</label>
        <input type="text" class="form-control" id="libelle" name="libelle" value ="<?php if ($action == 'modifier') {echo $Genre->libelle;} ?>">
    </div>
    <input type="hidden" id="num" name="num" value ="<?php if ($action == 'modifier') {echo $Genre->num;} ?>"/>
    <div class="container text-center mb-5">
        <button type="submit" class="<?php if ($action == 'modifier') {echo "btn btn-info btn-lg";} else {echo "btn btn-success btn-lg";} ?>"> <i class="fa-solid fa-plus"></i> <?php if ($action == 'modifier') {echo "Modifier le genre";} else {echo "Ajouter le genre";} ?></button>
        <a href="liste_Genres.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>
    </div>

</form>

<?php
include 'footer.php';  
?>
