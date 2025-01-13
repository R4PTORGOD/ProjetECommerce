<?php

class CharsController
{
  public function creation_chars()
  {
    // Load the model
    require_once __DIR__ . '/../models/CharsModel.php';
    require_once __DIR__ . '/../models/CategorieModel.php';
    // Instantiate the model
    $charsModel = new CharsModel();
    $categorieModel = new CategorieModel();
    
    // Get data from the model
    $dico_categories = $categorieModel->get_dico_categories();
    if(isset($_POST["submit"])) {
        $charsModel->insert_chars($_POST["nom"],$_POST["description"],$_POST["prix"],$_POST["stock"],$_POST["poids"],$_POST["calibre"],$_POST["vitesse"],$_POST["annee_conception"],$_POST["id_categorie"]);
    } 

    // Load the view
    require_once __DIR__ . '/../views/insert_chars.php';
  }

  public function lister_chars()
  {
    // Load the models
    require_once __DIR__ . '/../models/CharsModel.php';
    require_once __DIR__ . '/../models/CategorieModel.php';

    // Instantiate the model
    $charsModel = new CharsModel();
    $categorieModel = new CategorieModel();
    // Get data from the model
    $dico_categories = $categorieModel->get_dico_categories();
    if(isset($_POST["submit"])) {
      $chars = $charsModel->get_les_chars_par_categorie($_POST["id_categorie"]);
      $id_categorie_actuel = $_POST["id_categorie"];
    } else {
      $chars = $charsModel->get_les_chars_par_categorie($categorieModel->get_les_categories()[0]["id_cat"]);
      $id_categorie_actuel = $categorieModel->get_les_categories()[0]["id_cat"];
    }
    // Load the view
    require_once __DIR__ . '/../views/lister_chars.php';
  }

  public function gestion_chars()
  {
    // Load the models
    require_once __DIR__ . '/../models/CharsModel.php';
    require_once __DIR__ . '/../models/CategorieModel.php';

    // Instantiate the model
    $charsModel = new CharsModel();
    $categorieModel = new CategorieModel();
    // Get data from the model
    $dico_categories = $categorieModel->get_dico_categories();
    if(isset($_POST["submit"])) {
      $chars = $charsModel->get_les_chars_par_categorie($_POST["id_categorie"]);
      $id_categorie_actuel = $_POST["id_categorie"];
    } else {
      $chars = $charsModel->get_les_chars_par_categorie($categorieModel->get_les_categories()[0]["id_cat"]);
      $id_categorie_actuel = $categorieModel->get_les_categories()[0]["id_cat"];
    }
    // Load the view
    require_once __DIR__ . '/../views/gestion_chars.php';
  }

  public function modifier_chars()
  {
    // Load the model
    require_once __DIR__ . '/../models/CharsModel.php';
    require_once __DIR__ . '/../models/CategorieModel.php';
    // Instantiate the model
    $charsModel = new CharsModel();
    $categorieModel = new CategorieModel();
    
    // Get data from the model
    $dico_categories = $categorieModel->get_dico_categories();
    if(isset($_POST["modifier"])) {
      $char = $charsModel->get_le_char_par_id($_POST["id_char"]);
    }

    // Load the view
    require_once __DIR__ . '/../views/modifier_chars.php';
  }
}