<?php

class CategorieModel
{
  public function get_les_categories()
  {
    // Appel du Singleton de la BDD
    $pdo = Database::getInstance();
    // Création de ma requête
    $sql = "SELECT * FROM `Categorie`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    return $resultats;
  }

  public function get_dico_categories() 
  {
    $categorieModel = new CategorieModel();
    $categories = $categorieModel->get_les_categories();
    $dico_categories = [];
    foreach ($categories as $categorie) {
      $dico_categories += [$categorie["id_cat"] => $categorie["periode"]];
    }
    return $dico_categories;
  }
}

?>