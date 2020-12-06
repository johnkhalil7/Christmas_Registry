<?php
  session_start();
  include('php_scripts/database.php');

  $user_id = $_SESSION['user_id'];
  $sort_category = $_SESSION['sort_category'];

  $query = "SELECT *
            FROM items NATURAL JOIN priorities
            WHERE userID = :user_id
            ORDER BY $sort_category;";
  $statement = $db->prepare($query);
  $statement->bindValue(':user_id', $user_id);
  $statement->execute();
  $item_list = $statement->fetchAll();
  $statement->closeCursor();
 ?>

<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/homestyle.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

  <main>

    <form action="view_friends.php" method="post">
      <input type="submit" value="View Friends" id="view_friends">
    </form>

    <form action="index.php" method="post">
      <input type="submit" value="Logout" id ="logout">
    </form>
    <br>
    <table id="table_info">
      <tr>
        <th>Item</th>
        <th>Store</th>
        <th>Price</th>
        <th>Priority</th>
      </tr>
      <tr>
        <td>
          <form action="home_sort.php" method="post">
            <input type="hidden" name="sort_category" value="name">
            <input type="submit" value="Sort &#8661" id="sort">
          </form>
        </td>
        <td>
          <form action="home_sort.php" method="post">
            <input type="hidden" name="sort_category" value="store">
            <input type="submit" value="Sort &#8661" id="sort">
          </form>
        </td>
        <td>
          <form action="home_sort.php" method="post">
            <input type="hidden" name="sort_category" value="price">
            <input type="submit" value="Sort &#8661" id="sort">
          </form>
        </td>
        <td>
          <form action="home_sort.php" method="post">
            <input type="hidden" name="sort_category" value="ranking">
            <input type="submit" value="Sort &#8661" id="sort">
          </form>
        </td>
      </tr>
      <tr>
        <?php foreach ($item_list as $item_list) : ?>
          <td>
            <a href="<?php echo $item_list['link']; ?>" target="_blank">
              <?php echo $item_list['name']; ?>
            </a>
          </td>
          <td><?php echo $item_list['store']; ?></td>
          <td><?php echo '$' . $item_list['price']; ?></td>
          <td><?php echo $item_list['priority']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <form action="add_item_form.php" method="post">
      <input type="submit" value="Add an Item" id="add_item">
    </form>
    <br>

  </main>

<?php include('footer.php'); ?>
