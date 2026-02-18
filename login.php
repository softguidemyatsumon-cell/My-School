<?php
require "./layout/header.php";

?>
  <div class="login-body">
    <div class="login-container">
      <h2>Sign In</h2>
      <form id="loginForm">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit">Login</button>
        <p class="error-msg" id="errorMsg"></p>
        <a href="register.php">Sign Up</a>
      </form>
    </div>
  </div>
<?php
require "./layout/footer.php";
?>