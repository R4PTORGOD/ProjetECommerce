<button><a href="/?do=home">Home</a></button>

<h1>Liste des chars</h1>
<h3><?= $message ?></h3>
<form action="" method="post">
    <label for="id_categorie">ID Catégorie :</label><br>
    <select id="id_categorie" name="id_categorie" required>
        <?php
        foreach ($dico_categories as $id => $periode) { ?>
            <option value=<?= "$id" ?> <?= $id ==  $id_categorie_actuel ?  "selected" : "" ?>><?= $periode ?></option>
        <?php } ?>
    </select>
    <button id="submit" name="submit">Filtrer</button>
</form>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Date ajout</th>
            <th>Stock</th>
            <th>Poids (kg)</th>
            <th>Calibre (millimètre)</th>
            <th>Vitesse max (km/h)</th>
            <th>Année de conception</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Boucle pour remplir les lignes du tableau
        foreach ($chars as $char) { ?>
            <tr>
                <td><?= $char["nom"] ?></td>
                <td><?= $char["description"] ?></td>
                <td><?= $char["prix"] ?></td>
                <td><?= $char["date_ajout"] ?></td>
                <td><?= $char["stock"] ?></td>
                <td><?= $char["poids"] ?></td>
                <td><?= $char["calibre"] ?></td>
                <td><?= $char["vitesse"] ?></td>
                <td><?= $char["annee_conception"] ?></td>
                <form action="/?do=modifier_chars" method="post">
                    <td><button type="submit" name="modifier">Modifier</button></td>
                    <input type="hidden" name="id_cha" value="<?= $char["id_cha"] ?>">
                </form>
                <form action="/?do=supprimer_chars" method="post">
                    <td><button type="submit" name="supprimer">Supprimer</button></td>
                    <input type="hidden" name="id_cha" value="<?= $char["id_cha"] ?>">
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>