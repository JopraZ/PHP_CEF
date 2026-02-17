<h1 class="mb-4 text-dark">Trajets disponibles</h1>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
<?php unset($_SESSION['success']); endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
<?php unset($_SESSION['error']); endif; ?>

<?php if (empty($trajets)): ?>
    <div class="alert alert-info">
        Aucun trajet disponible pour le moment.
    </div>
<?php else: ?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Départ</th>
                <th>Date départ</th>
                <th>Arrivée</th>
                <th>Date arrivée</th>
                <th>Places</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <td><?= htmlspecialchars($trajet['agence_depart']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($trajet['date_depart'])) ?></td>
                    <td><?= htmlspecialchars($trajet['agence_arrive']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($trajet['date_arrive'])) ?></td>
                    <td>
                        <span class="badge bg-success">
                            <?= (int) $trajet['places_disponible'] ?>
                        </span>
                    </td>
                    <td class="text-end">
                        <!-- Détails : public -->
                        <a href="/trajet/<?= (int) $trajet['id_trajet'] ?>"
                           class="btn btn-sm btn-primary">
                            Détails
                        </a>

                        <!-- Modifier : uniquement si connecté ET auteur -->
                        <?php if (
                            isset($_SESSION['user']) &&
                            isset($trajet['id_user']) &&
                            (int) $_SESSION['user']['id'] === (int) $trajet['id_user']
                        ): ?>
                            <a href="/trajet/edit/<?= (int) $trajet['id_trajet'] ?>"
                               class="btn btn-sm btn-warning ms-1">
                                Modifier
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>
