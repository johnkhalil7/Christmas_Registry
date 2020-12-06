<?php
  session_start();
  include('php_scripts/database.php');

  $email = filter_input(INPUT_POST, 'email');
  $pass = filter_input(INPUT_POST, 'password');

  $query = "SELECT *
            FROM users
            WHERE email = :email;";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $user = $statement->fetch();
  $statement->closeCursor();

  if ($user != NULL && $user['password'] == $pass) {
    $_SESSION['user_id'] = $user['userID'];
    $_SESSION['sort_category'] = 'name';
    header("Location: home.php");
  }
  else {
    echo "Incorrect email or password.";
  }
 ?>
