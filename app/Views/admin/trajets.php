<h1 class="mb-4">Trajets</h1>

<table class="table table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Date</th>
            <th>Places</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($trajets as $trajet): ?>
            <tr>
                <td><?= htmlspecialchars($trajet['agence_depart']) ?></td>
                <td><?= htmlspecialchars($trajet['agence_arrive']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($trajet['date_depart'])) ?></td>
                <td><?= (int) $trajet['places_disponible'] ?></td>
                <td class="text-end">
                    <form
                        method="POST"
                        action="/admin/trajets/delete/<?= (int) $trajet['id_trajet'] ?>"
                        class="d-inline"
                        onsubmit="return confirm('Supprimer ce trajet ?');"
                    >
                        <button type="submit" class="btn btn-danger btn-sm">
                            Supprimer
                        </button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
