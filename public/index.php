<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();

// Define a base path for including files
$baseDir = __DIR__ . '/../src/';
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once $baseDir . 'models/Database.php';
require_once $baseDir . 'models/MongoDB.php';
$do = 'home';
// tableau des pages ou peuvent se rendre les clients
$do_client = ["home", "logout", "lister_chars", "lister_article"];

if (isset($_GET['do'])) {
  $do = $_GET['do'];
}

if ($do != 'login' && $do != 'register' && !isset($_SESSION['user'])) {
  header('Location: /?do=login');
} elseif (isset($_SESSION["user"])) {
  if ($_SESSION["user"]["role"] == "client" && !in_array($do, $do_client)) {
    header('Location: /?do=home');
  }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>

  <?php

  switch ($do) {
    case 'home':
      ob_end_flush();
      require $baseDir . 'controllers/HomeController.php';
      $controller = new HomeController();
      $controller->index();
      break;
    case 'register':
      require $baseDir . 'controllers/AuthController.php';
      $controller = new AuthController();
      $controller->register();
      break;
    case 'login':
      require $baseDir . 'controllers/AuthController.php';
      $controller = new AuthController();
      $controller->login();
      break;
    case 'logout':
      session_destroy();
      header('Location: /');
      break;
    case 'debug':
      ob_end_flush();
      require $baseDir . 'controllers/HomeController.php';
      $controller = new HomeController();
      $controller->debug();
      break;
    case 'creation_chars':
      ob_end_flush();
      require $baseDir . 'controllers/CharsController.php';
      $controller = new CharsController();
      $controller->creation_chars();
      break;
    case 'lister_chars':
      ob_end_flush();
      require $baseDir . 'controllers/CharsController.php';
      $controller = new CharsController();
      $controller->lister_chars();
      break;
    case 'gestion_chars':
      ob_end_flush();
      require $baseDir . 'controllers/CharsController.php';
      $controller = new CharsController();
      $controller->gestion_chars();
      break;
    case 'modifier_chars':
      require $baseDir . 'controllers/CharsController.php';
      $controller = new CharsController();
      $controller->modifier_chars();
      break;
    case 'supprimer_chars':
      require $baseDir . 'controllers/CharsController.php';
      $controller = new CharsController();
      $controller->supprimer_chars();
      break;
    case 'lister_article':
      ob_end_flush();
      require $baseDir . 'controllers/ArticleController.php';
      $controller = new ArticleController();
      $controller->lister_article();
      break;
    case 'insert_article':
      ob_end_flush();
      require $baseDir . 'controllers/ArticleController.php';
      $controller = new ArticleController();
      $controller->insert_article();
      break;
    case 'gestion_article':
      ob_end_flush();
      require $baseDir . 'controllers/ArticleController.php';
      $controller = new ArticleController();
      $controller->gestion_article();
      break;
    case 'modifier_article':
      ob_end_flush();
      require $baseDir . 'controllers/ArticleController.php';
      $controller = new ArticleController();
      $controller->modifier_article();
      break;
    default:
      ob_end_flush();
      http_response_code(404);
      echo 'Page not found!';
      break;
  }

  ?>

</body>

</html>