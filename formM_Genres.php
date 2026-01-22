<?php
include 'header.php';
?>
<div class="container text-primary text-center bg-primary bg-opacity-10 mt-5 p-5 rounded-4">
    <h1>Modification d'un genre</h1>
</div>

<form action="Modif_Genres.php" method="post">
    <div class="mb-3 container mt-5 col-md-3">
        <label for="libelle" class="form-label">Libellé du Genre</label>
        <input type="text" class="form-control" id="libelle" name="libelle" required>
    </div>
    <input type="hidden" id="num" name="num"></input>
    <div class="container text-center mb-5">
        <button type="submit" class="btn btn-info btn-lg"><i class="fa-solid fa-plus"></i>Modifier le genre</button>
        <a href="liste_Genres.php" class="btn btn-warning btn-lg"> <i class="fa-solid fa-circle-left"></i> Revenir sur la liste</a>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
