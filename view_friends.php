<?php
  session_start();
  include('php_scripts/database.php');

  $_SESSION['friend_id'] = '';

  $user_id = $_SESSION['user_id'];

  $query = "SELECT *
            FROM friends INNER JOIN users ON friends.friendID = users.userID
            WHERE friends.userID = :user_id;";
  $statement = $db->prepare($query);
  $statement->bindValue(':user_id', $user_id);
  $statement->execute();
  $list_friends = $statement->fetchAll();
  $statement->closeCursor();
 ?>

 <?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="styles/friendview.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <main>

    <table id = "table_info">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>List</th>
      </tr>
      <?php foreach ($list_friends as $list_friends) : ?>
        <tr>
          <td><?php echo $list_friends['firstName'] . ' ' . $list_friends['lastName']; ?></td>
          <td><?php echo $list_friends['email']; ?></td>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $list_friends['friendID']; ?>">
              <input type="hidden" name="sort_category" value="name">
              <input type="submit" value="View List" id ="view">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>

    <form action="add_friends_form.php" method="post">
      <input type="submit" value="Add Friends" id="add_friends">
    </form>
    <br>
    <form action="home.php" method="post">
      <input type="submit" value="Home &#x2302" id="home">
    </form>
    <br>
  </main>

 <?php include('footer.php'); ?>
