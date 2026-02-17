<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Touche pas au Klaxon</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-info d-flex flex-column min-vh-100">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            Touche pas au Klaxon
        </a>

        <div class="d-flex align-items-center gap-2">

            <?php if (empty($_SESSION['user'])): ?>

                <!-- ❌ UTILISATEUR NON CONNECTÉ -->
                <button
                    type="button"
                    class="btn btn-outline-light btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                >
                    Connexion
                </button>

            <?php else: ?>

                <!-- ✅ UTILISATEUR CONNECTÉ -->

                <span class="text-light small me-2">
                    <?= htmlspecialchars($_SESSION['user']['prenom']) ?>
                    <?= htmlspecialchars($_SESSION['user']['nom']) ?>
                </span>

                <a href="/admin" class="btn btn-primary btn-sm">
                    Dashboard
                </a>

                <a href="/logout" class="btn btn-outline-light btn-sm">
                    Déconnexion
                </a>

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/trajet/create" class="btn btn-success btn-sm me-2">
                        Proposer un trajet
                    </a>
                <?php endif; ?>


            <?php endif; ?>

        </div>
    </div>
</nav>


<main class="container my-4 flex-fill">
