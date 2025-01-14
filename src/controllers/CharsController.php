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

    if(isset($_GET["result"])) {
      $result = $_GET["result"];
      switch ($result){
        case "success_modify" :
          $message = "Modification réalisée avec succès";
          break;
        case "error_modify" :
          $message = "Une erreur à eu lieu lors de la modification";
          break;
        case "success_delete" :
          $message = "Suppression réalisée avec succès";
          break;
        case "error_delete" :
          $message = "Une erreur à eu lieu lors de la suppression";
          break;
        default :
          $message = "";
          break;
      }
        
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
      $char = $charsModel->get_le_char_par_id($_POST["id_cha"]);
    } elseif (!isset($_POST["submit_modif"])) {
      $char = $charsModel->get_char_vide();
      echo "Auncun char n'a été choisi pour modification, allez dans gestion pour modifier un char : ";
    }
    if(isset($_POST["submit_modif"]) && !isset($char)) {
      $result = $charsModel->update_chars($_POST["id_cha"],$_POST["nom"],$_POST["description"],$_POST["prix"],$_POST["stock"],$_POST["poids"],$_POST["calibre"],$_POST["vitesse"],$_POST["annee_conception"],$_POST["id_categorie"]);
      header("Location: /?do=gestion_chars&result=".$result);
      exit;
      ob_end_flush();
    }
    // Load the view
    require_once __DIR__ . '/../views/modifier_chars.php';
  }

  public function supprimer_chars()
  {
    // Load the model
    require_once __DIR__ . '/../models/CharsModel.php';
    require_once __DIR__ . '/../models/CategorieModel.php';
    // Instantiate the model
    $charsModel = new CharsModel();
    $categorieModel = new CategorieModel();
    
    // Get data from the model
    $dico_categories = $categorieModel->get_dico_categories();   

    if(isset($_POST["supprimer"])) {
      $char = $charsModel->get_le_char_par_id($_POST["id_cha"]);
    } elseif (!isset($_POST["submit_suppr"])) {
      $char = $charsModel->get_char_vide();
      echo "Auncun char n'a été choisi pour suppression, allez dans gestion pour supprimer un char : ";
    }
    if(isset($_POST["submit_suppr"]) && !isset($char)) {
      $result = $charsModel->delete_chars($_POST["id_cha"]);
      header("Location: /?do=gestion_chars&result=".$result);
      exit;
      ob_end_flush();
    }
    // Load the view
    require_once __DIR__ . '/../views/supprimer_chars.php';
  }
}