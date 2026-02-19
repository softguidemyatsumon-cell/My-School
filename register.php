<?php
session_start();
require "./layout/header.php";
require "./config/db_connection.php";

if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = trim($_POST['role']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email or username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR name = ?");
    $stmt->bind_param("ss", $email, $name);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        $error = "Username or email already exists!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
        if($stmt->execute()){
            $success = "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $error = "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}
?>

<div class="login-body">
    <div class="login-container">
        <h2>Sign Up</h2>
        <?php if(!empty($error)){ echo "<p style='color:red;'>$error</p>"; } ?>
        <?php if(!empty($success)){ echo "<p style='color:green;'>$success</p>"; } ?>

        <form id="RegisterForm" method="POST">
            <div class="input-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <label for="role">Role</label>
                <input type="text" id="role" name="role" placeholder="Role" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
</div>

<?php
require "./layout/footer.php";
?>
