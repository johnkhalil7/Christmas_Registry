<?php
  session_start();
  $_SESSION['user_id'] = '';
  $_SESSION['friend_id'] = '';
 ?>
<?php include('header.php'); ?>

    <main>

      <div class="container">
        <div class="login-register">

          <div class="nav-buttons">
            <button id="loginBtn" class='active' >Login</button>
            <button id="registerBtn">Register</button>
          </div>

          <div class="form-group">
            <form action="login.php" method="post" id="loginform">
              <label for="username">email</label>
              <input type="email" name="email" id="email" required>
              <label for="password">password</label>
              <input type="password" name="password" id="password" required>
              <input type="submit" value="Submit" class="submit">
            </form>

            <form action="register.php" method="post" id="registerform">
              <label for="first_name">first name</label>
              <input type="text" name="first_name" id="first_name" required>
              <label for="last_name">last name</label>
              <input type="text" name="last_name" id="last_name" required>
              <label for="email">email</label>
              <input type="email" name="email" id="email" required>
              <label for="password">password</label>
              <input type="password" name="password" id="password" required>
              <input type="submit" value="Submit" class="submit">
            </form>
          </div>

        </div>
      </div>

      <script type="text/javascript">
      var loginBtn = document.getElementById("loginBtn");
      var registerBtn = document.getElementById("registerBtn");
      var loginform = document.getElementById("loginform");
      var registerform = document.getElementById("registerform");

      registerBtn.onclick = function() {
        registerform.style.left='0px';
        registerform.style.opacity='1';
        loginform.style.left='-500px';
        loginform.style.opacity='0';
        registerBtn.classList.add('active');
        loginBtn.classList.remove('active');
      }

      loginBtn.onclick = function() {
        loginform.style.left='0px';
        loginform.style.opacity='1';
        registerform.style='500px';
        loginBtn.classList.add('active');
        registerBtn.classList.remove('active');
        registerform.style.opacity='0';
      }
    </script>

  </main>

<?php include ('footer.php'); ?>
