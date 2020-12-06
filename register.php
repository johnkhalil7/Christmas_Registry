<?php
  session_start();
  include('php_scripts/database.php');

  $first_name = filter_input(INPUT_POST, 'first_name');
  $last_name = filter_input(INPUT_POST, 'last_name');
  $email = filter_input(INPUT_POST, 'email');
  $pass = filter_input(INPUT_POST, 'password');

  $query = "INSERT INTO users
            (firstName, lastName, email, password)
            VALUES
            (:first_name, :last_name, :email, :password);";
  $statement = $db->prepare($query);
  $statement->bindValue(':first_name', $first_name);
  $statement->bindValue('last_name', $last_name);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':password', $pass);
  $statement->execute();
  $statement->closeCursor();
 ?>

<form action="login.php" method="post" id="registeredform">
  <input type="hidden" name="email" value="<?php echo $email; ?>">
  <input type="hidden" name="password" value="<?php echo $pass; ?>">
</form>

<script type="text/javascript">
  document.getElementById("registeredform").submit();
</script>
