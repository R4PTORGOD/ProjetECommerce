<button><a href="/?do=home">Home</a></button>
<button><a href="/?do=gestion_chars">Retour</a></button>

<h1>Voulez vous vraiment supprimer ce char :</h1>
<form action="" method="post">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value="<?= $char["nom"] ?>" readonly><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" cols="50" readonly><?= $char["description"] ?></textarea><br>

    <label for="prix">Prix :</label><br>
    <input type="number" id="prix" name="prix" step="0.01" value="<?= $char["prix"] ?>" readonly><br>

    <label for="stock">Stock :</label><br>
    <input type="number" id="stock" name="stock" value="<?= $char["stock"] ?>" readonly><br>
    
    <label for="poids">Poids (kg) :</label><br>
    <input type="number" id="poids" name="poids" value="<?= $char["poids"] ?>" step="1" readonly><br>

    <label for="calibre">Calibre (millimètre) :</label><br>
    <input type="number" id="calibre" name="calibre" value="<?= $char["calibre"] ?>" readonly><br>

    <label for="vitesse">Vitesse max (km/h) :</label><br>
    <input type="number" id="vitesse" name="vitesse" step="1" value="<?= $char["vitesse"] ?>" readonly><br>
    
    <label for="annee_conception">Année de conception :</label><br>
    <input type="number" id="annee_conception" name="annee_conception" value="<?= $char["annee_conception"] ?>" min="1900" max="2100" readonly><br>

    <label for="id_categorie">Catégorie :</label><br>
    <select id="id_categorie" name="id_categorie" disabled>
        <?php
        foreach ($dico_categories as $id => $periode) { ?>
            <option value=<?= "$id" ?> <?= $id ==  $char["id_categorie"] ? "selected" : "" ?>><?= $periode ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="id_cha" value="<?= $char["id_cha"] ?>">
    <button type="submit" name="submit_suppr">Supprimer</button>
</form>