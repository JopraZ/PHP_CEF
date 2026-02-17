<h1 class="mb-4 text-dark">Proposer un trajet</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
<?php unset($_SESSION['error']); endif; ?>

<form method="POST" action="/trajet/store" class="card shadow-sm p-4">

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Agence de départ</label>
            <select name="depart" class="form-select" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($agences as $agence): ?>
                    <option value="<?= (int) $agence['id_agence'] ?>">
                        <?= htmlspecialchars($agence['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Agence d’arrivée</label>
            <select name="arrivee" class="form-select" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($agences as $agence): ?>
                    <option value="<?= (int) $agence['id_agence'] ?>">
                        <?= htmlspecialchars($agence['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Date et heure de départ</label>
            <input
                type="datetime-local"
                name="date_depart"
                class="form-control"
                required
            >
        </div>

        <div class="col-md-6">
            <label class="form-label">Date et heure d’arrivée</label>
            <input
                type="datetime-local"
                name="date_arrive"
                class="form-control"
                required
            >
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label class="form-label">Nombre total de places</label>
            <input
                type="number"
                name="places_total"
                min="1"
                class="form-control"
                required
            >
        </div>

        <div class="col-md-6">
            <label class="form-label">Places disponibles</label>
            <input
                type="number"
                name="places_disponible"
                min="1"
                class="form-control"
                required
            >
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="/" class="btn btn-secondary">
            Annuler
        </a>

        <button type="submit" class="btn btn-success">
            Publier le trajet
        </button>
    </div>

</form>
