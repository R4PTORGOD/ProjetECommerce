<?php

class CharsModel
{
  public function get_les_chars()
  {
    // Appel du Singleton de la BDD
    $pdo = Database::getInstance();
    // Création de ma requête
    $sql = "SELECT *, Chars.id AS id_chars, Categorie.periode FROM `Chars` INNER JOIN Categorie ON Chars.id_categorie = Categorie.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    return $resultats;
  }

  public function get_les_chars_par_categorie($id_categorie)
  {
    // Appel du Singleton de la BDD
    $pdo = Database::getInstance();
    // Création de ma requête
    $sql = "SELECT * FROM `Chars` INNER JOIN Categorie ON Chars.id_categorie = Categorie.id_cat WHERE Categorie.id_cat = :id_categorie";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_categorie", $id_categorie);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    return $resultats;
  }

  public function get_le_char_par_id($id)
  {
    // Appel du Singleton de la BDD
    $pdo = Database::getInstance();
    // Création de ma requête
    $sql = "SELECT * FROM `Chars` WHERE id_cha = :id_cha LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_cha", $id);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    return $resultats[0];
  }

  public function get_char_vide() {
    return ["id_cha" => "", "nom" => "nom", "description" => "description", "prix" => "0", "date_ajout" => "1970-01-01 00:00:00", "stock" => "0", "poids" => "0", "calibre" => "0", "vitesse" => "0", "annee_conception" => "1970", "id_categorie" => ""];
  }

  public function insert_chars($nom, $description, $prix, $stock, $poids, $calibre, $vitesse, $annee_conception, $id_categorie)
  {
    try {

      // Appel du Singleton de la BDD
      $pdo = Database::getInstance();
      // Création de ma requête
      $sql = "INSERT INTO `Chars`(`id_cha`, `nom`, `description`, `prix`, `stock`, `poids`, `calibre`, `vitesse`, `annee_conception`, `id_categorie`) VALUES (:id_cha, :nom, :description, :prix, :stock, :poids, :calibre, :vitesse, :annee_conception, :id_categorie)";
      $stmt = $pdo->prepare($sql);
      $id = Database::generateUUID();
      $stmt->bindParam(":id_cha", $id);
      $stmt->bindParam(":nom", $nom);
      $stmt->bindParam(":description", $description);
      $stmt->bindParam(":prix", $prix);
      $stmt->bindParam(":stock", $stock);
      $stmt->bindParam(":poids", $poids);
      $stmt->bindParam(":calibre", $calibre);
      $stmt->bindParam(":vitesse", $vitesse);
      $stmt->bindParam(":annee_conception", $annee_conception);
      $stmt->bindParam(":id_categorie", $id_categorie);
      $stmt->execute();
    } catch (\Throwable $th) {
      echo "Problème lors de la création";
    }
  }

  public function update_chars($id_cha, $nom, $description, $prix, $stock, $poids, $calibre, $vitesse, $annee_conception, $id_categorie)
  {
    try {
      // Appel du Singleton de la BDD
      $pdo = Database::getInstance();
      // Création de ma requête
      $sql = "UPDATE Chars SET nom = :nom, description= :description, prix = :prix, stock = :stock, poids = :poids, calibre = :calibre, vitesse = :vitesse, annee_conception = :annee_conception, id_categorie = :id_categorie WHERE id_cha = :id_cha";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":id_cha", $id_cha);
      $stmt->bindParam(":nom", $nom);
      $stmt->bindParam(":description", $description);
      $stmt->bindParam(":prix", $prix);
      $stmt->bindParam(":stock", $stock);
      $stmt->bindParam(":poids", $poids);
      $stmt->bindParam(":calibre", $calibre);
      $stmt->bindParam(":vitesse", $vitesse);
      $stmt->bindParam(":annee_conception", $annee_conception);
      $stmt->bindParam(":id_categorie", $id_categorie);
      $stmt->execute();
      return "success_modify";
    } catch (\Throwable $th) {
      return "error_modify";
    }
  }

  public function delete_chars($id_cha) {
    try {
      // Appel du Singleton de la BDD
      $pdo = Database::getInstance();
      // Création de ma requête
      $sql = "DELETE FROM Chars WHERE id_cha = :id_cha";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":id_cha", $id_cha);
      $stmt->execute();
      return "success_delete";
    } catch (\Throwable $th) {
      return "error_delete";
    }
  }
}
