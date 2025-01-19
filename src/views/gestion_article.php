<button><a href="/?do=home">Home</a></button>

<h1>Gestion Blog</h1>
<form action="" method="post">
    <label for="tags">Entrez un tag à rechercher :</label>
    <input type="text" id="tags" name="tags"><br>
    <br>
    <label for="tags">Entrez un auteur à rechercher :</label>
    <input type="text" name="auteur"><br>
    <button id="submit" name="submit">Filtrer</button>
</form>
<table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Auteur</th>
        <th>Date de l'Article</th>
        <th>Tags</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Boucle pour remplir les lignes du tableau
    foreach ($articles as $article) {
        $tags = "";
        foreach ($article["tags"] as $tag) {
            $tags = $tags . $tag . "/";
        }
        ?>
        <tr>
            <td><?= $article["titre"] ?></td>
            <td><?= $article["contenu"] ?></td>
            <td><?= $article["auteur"] ?></td>
            <td><?= $article["date_de_creation"] ?></td>
            <td><?= $tags ?></td>
            <td>
                <form action="/?do=modifier_article" method="post">
                    <button type="submit" name="modifier">Modifier</button>
                    <input type="hidden" name="_id" value="<?= $article["_id"] ?>">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <button type="submit" name="supprimer">Supprimer</button>
                    <input type="hidden" name="_id" value="<?= $article["_id"] ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>