<h1 class="mb-4">Détail du trajet</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="card-title mb-3">
            <?= htmlspecialchars($trajet['agence_depart']) ?>
            →
            <?= htmlspecialchars($trajet['agence_arrive']) ?>
        </h5>

        <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item">
                <strong>Départ :</strong>
                <?= date('d/m/Y H:i', strtotime($trajet['date_depart'])) ?>
            </li>
            <li class="list-group-item">
                <strong>Arrivée :</strong>
                <?= date('d/m/Y H:i', strtotime($trajet['date_arrive'])) ?>
            </li>
            <li class="list-group-item">
                <strong>Places disponibles :</strong>
                <?= (int) $trajet['places_disponible'] ?> /
                <?= (int) $trajet['places_total'] ?>
            </li>
        </ul>

        <h6>Contact</h6>
        <p class="mb-1">
            <?= htmlspecialchars($trajet['prenom'] . ' ' . $trajet['nom']) ?>
        </p>
        <p class="mb-1">
            📞 <?= htmlspecialchars($trajet['telephone']) ?>
        </p>
        <p>
            ✉️ <?= htmlspecialchars($trajet['mail']) ?>
        </p>

        <a href="/" class="btn btn-secondary">
            Retour à la liste
        </a>

    </div>
</div>
