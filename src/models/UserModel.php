<?php

class UserModel
{
    public function getUserByEmail($email)
    {
        $pdo = Database::getInstance();
        $sql = "SELECT * FROM Utilisateur WHERE email = :email LIMIT 1";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetchAll();
        if (count($result) == 0) return null;
        return $result[0];
    }

    public function createUser($nom, $prenom, $email, $mot_de_passe)
    {
        $pdo = Database::getInstance();
        $sql = "INSERT INTO Utilisateur (id_uti, nom, prenom, email, mot_de_passe, role) VALUES (:id_uti, :nom, :prenom, :email, :mot_de_passe, :role)";
        $statement = $pdo->prepare($sql);
        $id_uti = Database::generateUUID();
        $statement->bindParam(':id_uti', $id_uti);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':mot_de_passe', $mot_de_passe);
        $statement->bindValue(':role', "client");
        $statement->execute();
        return $statement->rowCount();
    }
}