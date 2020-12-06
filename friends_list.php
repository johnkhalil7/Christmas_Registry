<?php
  session_start();
  include('php_scripts/database.php');

  $friend_id = $_SESSION['friend_id'];
  $sort_category = $_SESSION['sort_category'];

  $query = "SELECT *
            FROM items NATURAL JOIN priorities
            WHERE userID = :friend_id
            ORDER BY $sort_category;";
  $statement = $db->prepare($query);
  $statement->bindValue(':friend_id', $friend_id);
  $statement->execute();
  $friends_list = $statement->fetchAll();
  $statement->closeCursor();
 ?>

<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/homestyle.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <main>
    <form action="view_friends.php" method="post" id="view_friends_form">
      <input type="submit" value="View Friends" id="view_friends">
    </form>
    <br>
    <table id="table_info">
      <tr>
        <th>Item</th>
        <th>Store</th>
        <th>Price</th>
        <th>Priority</th>
        <th>Purchased</th>
      </tr>
        <tr>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
              <input type="hidden" name="sort_category" value="name">
              <input type="submit" value="Sort &#8661" id="sort">
            </form>
          </td>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
              <input type="hidden" name="sort_category" value="store">
              <input type="submit" value="Sort &#8661" id="sort">
            </form>
          </td>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
              <input type="hidden" name="sort_category" value="price">
              <input type="submit" value="Sort &#8661" id="sort">
            </form>
          </td>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
              <input type="hidden" name="sort_category" value="ranking">
              <input type="submit" value="Sort &#8661" id="sort">
            </form>
          </td>
          <td>
            <form action="friend_sort.php" method="post">
              <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
              <input type="hidden" name="sort_category" value="purchased">
              <input type="submit" value="Sort &#8661" id="sort">
            </form>
          </td>
        </tr>
        <?php foreach ($friends_list as $friends_list) : ?>
        <tr>
          <td>
            <a href="<?php echo $friends_list['link']; ?>" target="_blank">
              <?php echo $friends_list['name']; ?>
            </a>
          </td>
          <td><?php echo $friends_list['store']; ?></td>
          <td><?php echo '$' . $friends_list['price']; ?></td>
          <td><?php echo $friends_list['priority']; ?></td>
          <td>
            <?php if ($friends_list['purchased'] == 0) : ?>
              <form action="purchase.php" method="post">
                <input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
                <input type="hidden" name="name" value="<?php echo $friends_list['name']; ?>">
                <input type="submit" value="Mark as Purchased?" id="marked">
              </form>
            <?php elseif ($friends_list['purchased'] == 1) : ?>
              Already Purchased
            <?php endif; ?>
           </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <form action="home.php" method="post" id="home_form">
      <input type="submit" value="Home &#x2302" id="home">
     </form>
<br><br><br>
  </main>

<?php include('footer.php'); ?>
