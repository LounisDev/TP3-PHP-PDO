<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Biliothéque</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <h1 class="text-white p-3">Biliothéque</h1>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des genres </a>
          <div class="dropdown-menu"> <!-- Ajouter des icones fontawesome Plus tard  -->
            <a class="dropdown-item" href="#">Liste des Genres</a>
            <a class="dropdown-item" href="#">Ajouter Un Genre</a>
            <a class="dropdown-item" href="#">Supprimer Un Genre</a>
        </li>
        <li class="nav-item dropdown"> <!-- Ajouter des icones fontawesome Plus tard  -->
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des auteurs </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Liste des Auteurs</a>
            <a class="dropdown-item" href="#">Ajouter Un Auteur</a>
            <a class="dropdown-item" href="#">Supprimer Un Auteur</a>
        </li>
        <li class="nav-item dropdown"> <!-- Ajouter des icones fontawesome Plus tard  -->
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des nationalités </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="liste_Nationalites.php">Liste des nationnalité</a>
            <a class="dropdown-item" href="#">Ajouter une nationnalité</a>
            <a class="dropdown-item" href="#">Supprimer une nationnalité</a>
        </li>
      </ul>
    </div>
  </div>
</nav>