<?php include('php_scripts/database.php'); ?>

 <?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/addFriend.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">

 <main>
<br><br>

   <form action="add_friend.php" method="post" id="add_friends">
     <label for="email" id ="email">Email:</label>
     <input type="text" name="email">
     <input type="submit" value="Add" id = "add">
   </form>
   <br><br>
   <form action="home.php" method="post" id="home_form">
     <input type="submit" value="Home &#x2302" id="home">
   </form>
   <form action="view_friends.php" method="post" id="view_friends_form">
     <input type="submit" value="View Friends" id="view_friends">
   </form>
</main>
<br><br><br>
<?php include('footer.php'); ?>
