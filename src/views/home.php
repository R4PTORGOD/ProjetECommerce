<h1>Bienvenue sur la page d'accueil</h1>
<?php
if ($_SESSION["user"]["role"] == "administrateur") { ?>
    <button><a href="/?do=debug">debug</a></button>
    <button><a href="/?do=creation_chars">Création des chars</a></button>
    <button><a href="/?do=gestion_chars">Gestion des chars</a></button>
    <button><a href="/?do=insert_article">Création d'Article</a></button>
    <button><a href="/?do=gestion_article">Gestion d'Article</a></button>
<?php } ?>
<button><a href="/?do=lister_chars">Afficher les chars</a></button>
<button><a href="/?do=lister_article">Blog</a></button>
<button><a href="/?do=logout">Deconnexion</a></button>