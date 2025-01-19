<?php

class ArticleController
{
    public function lister_article()
    {
        // Load the model
        require_once __DIR__ . '/../models/ArticleModel.php';

        // Instantiate the model
        $articleModel = new ArticleModel();

        // Get data from the model
        $auteur = "";
        $tag = "";
        if (isset($_POST["submit"])) {
            if (isset($_POST["auteur"])) {
                $auteur = $_POST["auteur"];
            }
            if (isset($_POST["tags"])) {
                $tag = $_POST["tags"];
            }
        }
        $articles = $articleModel->getArticles($tag, $auteur);

        // Load the view
        require_once __DIR__ . '/../views/lister_article.php';
    }

    public function insert_article()
    {
        // Load the model
        require_once __DIR__ . '/../models/ArticleModel.php';

        // Instantiate the model
        $articleModel = new ArticleModel();

        // Get data from the model
        if (isset($_POST["submit"])) {
            $articleModel->insertArticle($_POST["titre"], $_POST["contenu"], $_POST["auteur"], $_POST["tags"]);
        }

        // Load the view
        require_once __DIR__ . '/../views/insert_article.php';
    }

    public function modifier_article()
    {
        // Load the model
        require_once __DIR__ . '/../models/ArticleModel.php';

        // Instantiate the model
        $articleModel = new ArticleModel();

        // Get data from the model
        if (isset($_POST["modifier"])) {
            $article = $articleModel->getArticlesParId($_POST["_id"]);
            $tags = "";
            foreach ($article["tags"] as $tag) {
                $tags .= $tag . "/";
            }
            $tags = substr($tags, 0, -1);
        } elseif (!isset($_POST["submit_modif"])) {
            $article = [
                "_id"     => "",
                "titre"   => "",
                "contenu" => "",
                "auteur"  => "",
                "tags"    => ""
            ];
            $tags = "";
            echo "Auncun article n'a été choisi pour modification, allez dans gestion pour modifier un article : ";
        }

        if (isset($_POST["submit_modif"])) {
            $articleModel->updateArticle($_POST["_id"], $_POST["titre"], $_POST["contenu"], $_POST["auteur"], $_POST["tags"]);
            $article = [
                "_id"     => "",
                "titre"   => "",
                "contenu" => "",
                "auteur"  => "",
                "tags"    => ""
            ];
            $tags = "";
        }

        // Load the view
        require_once __DIR__ . '/../views/modifier_article.php';
    }

    public function gestion_article()
    {
        // Load the model
        require_once __DIR__ . '/../models/ArticleModel.php';

        // Instantiate the model
        $articleModel = new ArticleModel();

        // Get data from the model
        if (isset($_POST["supprimer"])) {
            $articleModel->deleteArticlesParId($_POST["_id"]);
        }

        $auteur = "";
        $tag = "";
        if (isset($_POST["submit"])) {
            if (isset($_POST["auteur"])) {
                $auteur = $_POST["auteur"];
            }
            if (isset($_POST["tags"])) {
                $tag = $_POST["tags"];
            }
        }
        $articles = $articleModel->getArticles($tag, $auteur);

        // Load the view
        require_once __DIR__ . '/../views/gestion_article.php';
    }
}