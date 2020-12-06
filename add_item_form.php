<?php
  include('php_scripts/database.php');

  $query = "SELECT *
            FROM priorities;";
  $statement = $db->prepare($query);
  $statement->execute();
  $priority_list = $statement->fetchAll();
  $statement->closeCursor();
 ?>

 <?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/addItemStyle.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

 <main>

   <form action="add_item.php" method="post">
     <br>
     <label for="name">Name of Item:</label>
     <input type="text" name="name" required>
     <br><br><br>
     <label for="store">Store:</label>
     <input type="text" name="store" required>
     <br><br><br>
     <label for="price">Price:</label>
     <input type="text" name="price" required>
     <br><br><br>
     <label for="priority">Priority: </label>
     <select name="priority">
       <?php foreach ($priority_list as $priority_list) : ?>
         <option value="<?php echo $priority_list['priority']; ?>"><?php echo $priority_list['priority']; ?></option>
       <?php endforeach; ?>
     </select>
     <br><br><br>
     <label for="link">Link:</label>
     <input type="text" name="link" required>
     <br><br><br>
     <input type="submit" value="Add Item" id="add_item">
   </form>
   <form action="home.php" method="post" id="home_form">
     <input type="submit" value="Home &#x2302" id="home">
   </form>
</main>

<?php include('footer.php'); ?>
