<?php

/**************
 * SIGNIN CONTROLLER
 *************/

if (isset($_SESSION['user'])) {
  header ('Location: /');
  echo 'here';
} else {

  include('views/components/header.php');
  include('models/User.php');

  $section = 'signin';

  if (sizeof($_POST) > 0) {
    if (!empty($_POST['login'])) {
      if (!empty($_POST['password'])) {
        $q = 'SELECT * FROM users WHERE login = \'' . $_POST['login'] . '\'';
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo -> prepare($q);
        $stmt -> execute([]);
        $users = $stmt -> fetchall(PDO::FETCH_ASSOC);
        if (sizeof($users) === 1) {
          $user = $users[0];
          if (password_verify('rasmuslerdorf', $user['password'])) {
            $_SESSION['user'] = new User($user);
            include('views/home.php');
          } else {
            $error = 'Ce login ou ce mot de passe est invalide.';
            include('views/main-index.php');
          }
        } else {
          $error = 'Ce login ou ce mot de passe est invalide.';
          include('views/main-index.php');
        }
      } else {
        $error = 'Le mot de passe est vide.';
        include('views/main-index.php');
      }
    } else {
      $error = 'Le login est vide.';
      include('views/main-index.php');
    }
  } else {
    $error = '';
    include('views/main-index.php');
  }

}

