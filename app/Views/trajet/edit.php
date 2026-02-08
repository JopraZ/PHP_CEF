<h1 class="mb-4">Modifier le trajet</h1>

<form method="POST" action="/trajet/update/<?= (int) $trajet['id_trajet'] ?>">

    <!-- Agence de départ -->
    <div class="mb-3">
        <label class="form-label">Agence de départ</label>
        <select name="depart" class="form-select" required>
            <?php foreach ($agences as $agence): ?>
                <option
                    value="<?= (int) $agence['id_agences'] ?>"
                    <?= $agence['id_agences'] == $trajet['id_agence_depart'] ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($agence['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Agence d’arrivée -->
    <div class="mb-3">
        <label class="form-label">Agence d’arrivée</label>
        <select name="arrivee" class="form-select" required>
            <?php foreach ($agences as $agence): ?>
                <option
                    value="<?= (int) $agence['id_agences'] ?>"
                    <?= $agence['id_agences'] == $trajet['id_agence_arrive'] ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($agence['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Date départ -->
    <div class="mb-3">
        <label class="form-label">Date de départ</label>
        <input
            type="datetime-local"
            name="date_depart"
            class="form-control"
            value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_depart'])) ?>"
            required
        >
    </div>

    <!-- Date arrivée -->
    <div class="mb-3">
        <label class="form-label">Date d’arrivée</label>
        <input
            type="datetime-local"
            name="date_arrive"
            class="form-control"
            value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_arrive'])) ?>"
            required
        >
    </div>

    <!-- Places totales -->
    <div class="mb-3">
        <label class="form-label">Nombre total de places</label>
        <input
            type="number"
            name="places_total"
            class="form-control"
            min="1"
            value="<?= (int) $trajet['places_total'] ?>"
            required
        >
    </div>

    <!-- Places disponibles -->
    <div class="mb-3">
        <label class="form-label">Places disponibles</label>
        <input
            type="number"
            name="places_disponible"
            class="form-control"
            min="0"
            value="<?= (int) $trajet['places_disponible'] ?>"
            required
        >
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>

        <a href="/" class="btn btn-secondary">
            Annuler
        </a>
    </div>

</form>
