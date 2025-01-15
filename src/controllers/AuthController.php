<?php

class AuthController
{
  public function register()
  {
    // Check if the form has been submitted
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
      // Get the form data
      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $mot_de_passe = $_POST['mot_de_passe'];

      // Check if the form data is valid
      if (empty($prenom) || empty($nom) || empty($email) || empty($mot_de_passe)) {
        echo 'Veuillez remplir tous les champs';
      } else {
        // Load the model
        require_once __DIR__ . '/../models/UserModel.php';

        // Instantiate the model
        $userModel = new UserModel();

        // Check if the user exists in the database
        $user = $userModel->getUserByEmail($email);

        if ($user) {
          echo 'Cet email est déjà utilisé';
        } elseif (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!.@;:&$%^&*-]).{8,}$/', $mot_de_passe)) { // Vérification si le mot de passe est fort
          echo "Mot de passe invalide. Assurez-vous qu'il contient au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.";
        } else {
          // creation du sel
          $sel = $userModel->get_sel();
          // Create a new user
          $user = $userModel->createUser($prenom, $nom, $email, password_hash($sel . $mot_de_passe, PASSWORD_BCRYPT), $sel);

          if ($user) {
            // Redirect to the login page
            header('Location: /?do=login');
          } else {
            echo 'Une erreur est survenue lors de la création de votre compte';
          }
        }
      }
    }

    require_once __DIR__ . '/../views/register.php';
  }

  public function login()
  {
    // Check if the form has been submitted
    if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
      // Get the form data
      $email = $_POST['email'];
      $mot_de_passe = $_POST['mot_de_passe'];

      // Check if the form data is valid
      if (empty($email) || empty($mot_de_passe)) {
        echo 'Veuillez remplir tous les champs';
      } else {
        // Load the model
        require_once __DIR__ . '/../models/UserModel.php';

        // Instantiate the model
        $userModel = new UserModel();

        // Check if the user exists in the database
        $user = $userModel->getUserByEmail($email);

        if (!$user) {
          echo 'Cet email n\'est pas associé à un compte';
        } else {
          // Check if the password is correct
          if (password_verify($user['sel'] . $mot_de_passe, $user['mot_de_passe'])) {
            // Set the session variables
            $_SESSION['user'] = $user;
            header('Location: /?do=home');
          }
        }
      }
    }

    require_once __DIR__ . '/../views/login.php';
  }
}
