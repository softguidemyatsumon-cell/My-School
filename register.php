<?php
require "./layout/header.php";
?>
  <div class="login-body">
    <div class="login-container">
      <h2>Sign Up</h2>
      <form id="loginForm">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit">Register</button>
        <p class="error-msg" id="errorMsg"></p>
      </form>
    </div>
  </div>
<?php
require "./layout/footer.php";
?>