<h1 class="mb-4">Modifier une agence</h1>

<form method="POST" action="/admin/agences/update/<?= (int) $agence['id_agences'] ?>">
    <div class="mb-3">
        <label class="form-label">Nom de l’agence</label>
        <input
            type="text"
            name="nom"
            class="form-control"
            value="<?= htmlspecialchars($agence['nom']) ?>"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Enregistrer
    </button>

    <a href="/admin/agences" class="btn btn-secondary">
        Annuler
    </a>
</form>
