<h1 class="mb-4">Agences</h1>

<form method="POST" action="/admin/agences/create" class="row g-2 mb-4">
    <div class="col-auto">
        <input
            type="text"
            name="nom"
            class="form-control"
            placeholder="Nom de l’agence"
            required
        >
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-success">
            Créer une agence
        </button>
    </div>
</form>


<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agences as $agence): ?>
            <tr>
                <td><?= htmlspecialchars($agence['nom']) ?></td>
                <td class="text-end">
                <a
                    href="/admin/agences/edit/<?= (int) $agence['id_agences'] ?>"
                    class="btn btn-warning btn-sm"
                >
                    Modifier
                </a>
                <form
                    method="POST"
                    action="/admin/agences/delete/<?= (int) $agence['id_agences'] ?>"
                    class="d-inline"
                    onsubmit="return confirm('Supprimer cette agence ?');"
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
