<div class="linkTableau"><a href="index.php?page=kid">Ajouter un enfant</a></div>
<table>
    <thead>
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Date de naissance</th>
        <th>Problèmes médicaux</th>
        <th>Allergies</th>
        <th>Personne 1</th>
        <th>tél.</th>
        <th>Personne 2</th>
        <th>tél.</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($kids as $kid) :
        if ($kid->user_id == $_SESSION['user']['id']) { ?>
            <tr>

                <td><?= $kid->prenom; ?></td>
                <td><?= $kid->nom; ?></td>
                <td><?= $kid->date_naissance; ?></td>
                <td><?= $kid->prob_medicaux; ?></td>
                <td><?= $kid->allergies; ?></td>
                <td><?= $kid->personne_1; ?></td>
                <td>0<?= $kid->tel_1; ?></td>
                <?php if ($kid->personne_2) { ?>
                    <td><?= $kid->personne_2; ?></td>
                    <td>0<?= $kid->tel_2; ?></td>
                <?php } ?>

            </tr>
        <?php } endforeach; ?>
    </tbody>
</table>




