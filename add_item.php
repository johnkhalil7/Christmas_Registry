<?php
  session_start();
  include('php_scripts/database.php');

  $user_id = $_SESSION['user_id'];
  $name = filter_input(INPUT_POST, 'name');
  $store = filter_input(INPUT_POST, 'store');
  $price = filter_input(INPUT_POST, 'price');
  $priority = filter_input(INPUT_POST, 'priority');
  $link = filter_input(INPUT_POST, 'link');


  $query = "INSERT INTO items
            (userID, name, store, price, priority, link, purchased)
            VALUES
            (:user_id, :name, :store, :price, :priority, :link, 0);";
  $statement = $db->prepare($query);
  $statement->bindValue(':user_id', $user_id);
  $statement->bindValue(':name', $name);
  $statement->bindValue(':store', $store);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':priority', $priority);
  $statement->bindValue(':link', $link);
  $statement->execute();
  $statement->closeCursor();

  header('Location: home.php');
 ?>
