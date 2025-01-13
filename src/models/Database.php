<?php


class Database
{
    // Instance unique de PDO
    private static $instance = null;
    private $pdo;
    
    // Constructeur privé pour empécher 1'instanciation directe
    private function __construct()
    {
        try {
            $dsn = "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv("DB_NAME") . ";charset=utf8mb4";
            $username = getenv("DB_USER");
            $password = getenv("DB_PASSWORD");
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Méthode pour obtenir 1'instance unique
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
    // Clonage et réveil désactivés
    public function __clone() {}
    public function __wakeup() {}

    public static function generateUUID()
    {
        // Generate 16 bytes (128 bits) of random data or use a cryptographic library
        $data = random_bytes(16);

        // Set version to 4, which indicates a random UUID
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        // Set the two most significant bits to 10, for the variant
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

        // Output the 36-character UUID
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

try {
    $pdo = Database::getInstance();
    // Utilisez $pdo pour exécuter des requétes SQL
} catch (Exception $e) {
    echo $e->getMessage();
}

?>