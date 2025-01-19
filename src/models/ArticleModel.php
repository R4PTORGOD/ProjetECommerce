<?php

use MongoDB\BSON\ObjectId;

class ArticleModel
{
    public function getArticles($tag, $auteur)
    {
        $bdd = MongoDB::getInstance();
        $articles = $bdd->Article->find([
            '$and' => [
                ['tags' => ['$elemMatch' => ['$regex' => $tag, '$options' => 'i']]],
                ['auteur' => ['$regex' => $auteur, '$options' => 'i']]
            ]]);
        return $articles;
    }

    public function getArticlesParId($id)
    {
        $bdd = MongoDB::getInstance();
        $articles = $bdd->Article->find(['_id' => new ObjectId($id)]);
        foreach ($articles as $article) {
            return $article;
        }
        return null;
    }

    public function deleteArticlesParId($id)
    {
        $bdd = MongoDB::getInstance();
        $bdd->Article->deleteOne(['_id' => new ObjectId($id)]);
    }

    public function insertArticle($titre, $contenu, $auteur, $tags)
    {
        $bdd = MongoDB::getInstance();

        $article = [
            'titre'            => $titre,
            'contenu'          => $contenu,
            'auteur'           => $auteur,
            'date_de_creation' => date('Y-m-d H:i:s'),
            'tags'             => explode("/", $tags)
        ];

        $bdd->Article->insertOne($article);
    }

    function updateArticle($id, $titre, $contenu, $auteur, $tags)
    {
        $bdd = MongoDB::getInstance();

        $article = [
            'titre'   => $titre,
            'contenu' => $contenu,
            'auteur'  => $auteur,
            'tags'    => explode("/", $tags)
        ];

        $bdd->Article->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => $article]
        );
    }
}
