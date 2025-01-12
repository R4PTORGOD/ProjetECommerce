<?php

class CharModel
{
  public function insert_char($nom, $description, $prix, $stock, $poids, $calibre, $vitesse, $annee_conception, $id_categorie)
  {
    // Appel du Singleton de la BDD
    $pdo = Database::getInstance();
    // Création de ma requête
    $sql = "INSERT INTO `Char`(`id`, `nom`, `description`, `prix`, `date_ajout`, `stock`, `poids`, `calibre`, `vitesse`, `annee_conception`, `id_categorie`) VALUES (:id, :nom, :description, :prix, :date_ajout, :stock, :poids, :calibre, :vitesse, :annee_conception, :id_categorie)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", Database::generateUUID());
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":date_ajout", "oui");
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":nom", $nom);
  }
}
