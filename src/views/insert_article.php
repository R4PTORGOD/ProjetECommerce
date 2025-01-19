<button><a href="/?do=home">Home</a></button>

<h1>Ajouter un Article</h1>
<form action="" method="post">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="contenu">Contenu :</label><br>
    <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br><br>

    <label for="auteur">Auteur :</label><br>
    <input type="text" id="auteur" name="auteur" required><br><br>

    <label for="tags">Tags (entrez les tags que vous voulez, séparé par des /) :</label><br>
    <input type="text" id="tags" name="tags" required><br><br>

    <button type="submit" name="submit">Créer</button>
</form>