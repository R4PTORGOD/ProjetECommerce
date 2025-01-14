<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
// Define a base path for including files
$baseDir = __DIR__ . '/../src/';

require_once $baseDir . 'models/Database.php';
$do = 'home';

if (isset($_GET['do'])) {
  $do = $_GET['do'];
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
    default:
      ob_end_flush();
      http_response_code(404);
      echo 'Page not found!';
      break;
  }

  ?>

</body>

</html>