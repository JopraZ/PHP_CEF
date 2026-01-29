<h1 class="mb-4">Utilisateurs</h1>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['prenom'].' '.$user['nom']) ?></td>
                <td><?= htmlspecialchars($user['mail']) ?></td>
                <td>
                    <span class="badge bg-secondary"><?= $user['role'] ?></span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
