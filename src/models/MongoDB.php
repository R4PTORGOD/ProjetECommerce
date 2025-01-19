<?php

use MongoDB\Client;

class MongoDB
{
    // Instance unique de la BDD
    private static $instance = null;
    private $bdd;

    private function __construct()
    {
        try {
            $adminUser = getenv("MONGO_INITDB_ROOT_USERNAME");
            $adminPassword = getenv("MONGO_INITDB_ROOT_PASSWORD");
            $host = getenv("MONGO_INITDB_HOST");
            $port = getenv("MONGO_INITDB_PORT");
            $database_name = getenv("MONGO_INITDB_DATABASE");

            $uri = "mongodb://{$adminUser}:{$adminPassword}@{$host}:{$port}/admin";

            $client = new Client($uri);

            MongoDB::create_database($client);

            $this->bdd = $client->selectDatabase($database_name);
        } catch (\Throwable $th) {
            throw new Exception("Erreur de connexion : " . $th->getMessage());
        }
    }

    // Méthode pour obtenir 1'instance unique
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->bdd;
    }

    public function __clone()
    {
    }

    public function __wakeup()
    {
    }

    private function database_exist($database_name, $client)
    {
        $databases = $client->listDatabases();

        foreach ($databases as $database) {
            if ($database->getName() == $database_name) {
                return true;
            }
        }
        return false;
    }

    private function create_database($client)
    {
        $database_name = getenv("MONGO_INITDB_DATABASE");
        if (!MongoDB::database_exist($database_name, $client)) {
            $collection = $client->$database_name->Article;
            $init = [
                "titre"            => "Article d'initialisation",
                "contenu"          => "Contenu d'initialisation",
                "auteur"           => "Auteur d'initialisation",
                "date_de_creation" => "01/01/1970",
                "tags"             => ["test", "initialisation", "admin"]
            ];
            $collection->insertOne($init);
        }
    }
}

try {
    $bdd = MongoDB::getInstance();
} catch (Exception $e) {
    echo $e->getMessage();
}
