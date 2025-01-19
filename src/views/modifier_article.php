<button><a href="/?do=home">Home</a></button>

<h1>modifier un Article</h1>
<form action="" method="post">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" value="<?= $article["titre"] ?>" required><br><br>

    <label for="contenu">Contenu :</label><br>
    <textarea id="contenu" name="contenu" rows="4" cols="50" required><?= $article["contenu"] ?></textarea><br><br>

    <label for="auteur">Auteur :</label><br>
    <input type="text" id="auteur" name="auteur" value="<?= $article["auteur"] ?>" required><br><br>

    <label for="tags">Tags (entrez les tags que vous voulez, séparé par des /) :</label><br>
    <input type="text" id="tags" name="tags" value="<?= $tags ?>" required><br><br>

    <input type="hidden" name="_id" value="<?= $article["_id"] ?>">
    <button type="submit" name="submit_modif">Modifier</button>
</form>