<button><a href="/?do=home">Home</a></button>

<h1>Ajouter un Char</h1>
<form action="" method="post">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

    <label for="prix">Prix :</label><br>
    <input type="number" id="prix" name="prix" step="0.01" required><br><br>

    <label for="stock">Stock :</label><br>
    <input type="number" id="stock" name="stock" required><br><br>

    <label for="poids">Poids (kg) :</label><br>
    <input type="number" id="poids" name="poids" step="1" required><br><br>

    <label for="calibre">Calibre (millimètre) :</label><br>
    <input type="number" id="calibre" name="calibre" required><br><br>

    <label for="vitesse">Vitesse max (km/h) :</label><br>
    <input type="number" id="vitesse" name="vitesse" step="1" required><br><br>

    <label for="annee_conception">Année de conception :</label><br>
    <input type="number" id="annee_conception" name="annee_conception" min="1900" max="2100" required><br><br>

    <label for="id_categorie">Catégorie :</label><br>
    <select id="id_categorie" name="id_categorie" required>
        <?php
        foreach ($dico_categories as $id => $periode) {
            echo "<option value=\"$id\">$periode</option>";
        }
        ?>
    </select>

    <button type="submit" name="submit">Créer</button>
</form>