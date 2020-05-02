<?php

/**************
 * SIGNUP CONTROLLER
 *************/

if (isset($_SESSION['user'])) {
  header ('Location: /');
} else {

  include('views/components/header.php');
  include('models/User.php');

	$section = 'signup';

  if (sizeof($_POST) > 0) {
    if (!empty($_POST['email'])) {
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        if (!empty($_POST['login'])) {
          if (!empty($_POST['password'])) {
            if (!empty($_POST['confirm_password'])) {
              if ($_POST['password'] === $_POST['confirm_password']) {
                $q = 'SELECT * FROM users WHERE login = \'' . $_POST['login'] . '\' OR email = \'' . $_POST['email'] . '\'';
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo -> prepare($q);
                $stmt -> execute([]);
                $users = $stmt -> fetchall(PDO::FETCH_ASSOC);
                if (sizeof($users) === 0) {
                  $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                  $user = new User($_POST);
                  $q = 'INSERT INTO users (login, email, password, username) VALUES ('
                    . '\'' . $user -> getLogin() . '\','
                    . '\'' . $user -> getEmail() . '\','
                    . '\'' . $hashed_password . '\','
                    . '\'' . $user -> getUsername()
                  . '\')';
                  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $stmt = $pdo -> prepare($q);
                  $stmt -> execute([]);
                  $_SESSION['user'] = $user;
                  include('views/home.php');
                } else {
                  $error = 'Ce login ou cet adresse mail est déjà utilisé par un autre utilisateur.';
                  include('views/main-index.php');
                }
              } else {
                $error = 'Votre mot de passe et confirmation de mot de passe ne sont pas les même.';
                include('views/main-index.php');
              }
            } else {
              $error = 'Votre confirmation de mot de passe est vide.';
              include('views/main-index.php');
            }
          } else {
            $error = 'Votre mot de passe est vide.';
            include('views/main-index.php');
          }
        } else {
          $error = 'Votre login est vide.';
          include('views/main-index.php');
        }
      } else {
        $error = 'Vote email est invalide.';
        include('views/main-index.php');
      }
    } else {
      $error = 'Votre email est vide.';
      include('views/main-index.php');
    }
  } else {
    $error = '';
    include('views/main-index.php');
  }
  
}