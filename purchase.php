<?php
  session_start();
  include('php_scripts/database.php');

  $friend_id = filter_input(INPUT_POST, 'friend_id');
  $name = filter_input(INPUT_POST, 'name');

  $query = "UPDATE items
            SET purchased = 1
            WHERE userID = :friend_id
            AND name = :name;";
  $statement = $db->prepare($query);
  $statement->bindValue(':friend_id', $friend_id);
  $statement->bindValue(':name', $name);
  $statement->execute();
  $statement->closeCursor();

  header("Location: friends_list.php");
 ?>
