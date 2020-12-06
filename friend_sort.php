<?php
  session_start();

  $friend_id = filter_input(INPUT_POST, 'friend_id');
  $_SESSION['friend_id'] = $friend_id;

  $sort_category = filter_input(INPUT_POST, 'sort_category');
  $_SESSION['sort_category'] = $sort_category;

  header('Location: friends_list.php');
?>
