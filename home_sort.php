<?php
  session_start();

  $sort_category = filter_input(INPUT_POST, 'sort_category');
  $_SESSION['sort_category'] = $sort_category;

  header('Location: home.php');
?>
