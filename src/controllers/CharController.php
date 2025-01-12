<?php

class CharController
{
  public function creation_char()
  {
    // Load the model
    require_once __DIR__ . '/../models/CharModel.php';

    // Instantiate the model
    $charModel = new CharModel();

    // Get data from the model
    if(isset($_POST["submit"])) {
        $charModel->insert_char($_POST["nom"],$_POST["description"],$_POST["prix"],$_POST["stock"],$_POST["poids"],$_POST["calibre"],$_POST["vitesse"],$_POST["annee_conception"],$_POST["id_categorie"]);
    } 

    // Load the view
    require_once __DIR__ . '/../views/home.php';
  }
}