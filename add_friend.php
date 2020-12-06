<?php
  session_start();
  include('php_scripts/database.php');

  $user_id = $_SESSION['user_id'];
  $email = filter_input(INPUT_POST, 'email');

  echo $email;

  $query = "SELECT *
            FROM users
            WHERE email = :email;";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $friend_id = $statement->fetch();
  $statement->closeCursor();

  if ($friend_id != NULL && $friend_id['userID'] != $user_id) {
    $query = "INSERT INTO friends
    (userId, friendID)
    VALUES
    (:user_id, :friend_id);";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':friend_id', $friend_id['userID']);
    $statement->execute();
    $statement->closeCursor();
  }

  header('Location: view_friends.php');

 ?>
