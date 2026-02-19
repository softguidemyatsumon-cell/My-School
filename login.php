<?php
session_start();
require "./config/db_connection.php";
require "./require/common.php";
$error = "";

if (isset($_POST["login"])) {
    $name = trim($_POST["name"]);
    $password = $_POST["password"];

    if (empty($name) || empty($password)) {
        $error = "Please fill username and password!";
    } else {
        // Fetch user by name
        $stmt = $conn->prepare("SELECT id, role, password FROM users WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Verify password
        if (!$row || !password_verify($password, $row['password'])) {
            $error = "Invalid username or password";
        } else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === "admin") {
                 header("Location: {$admin_base_url}index.php?success=Login Success");
            } elseif ($row['role'] === "teacher") {
                header("Location: teacher/teacher_dashboard.php");
            } else {
                header("Location: student/student_dashboard.php");
            }
            exit();
        }
    }
    $stmt->close();
}

require "./layout/header.php";
?>

<div class="login-body">
    <div class="login-container">
        <h2>Sign In</h2>
        <?php if($error){ echo "<div class='alert alert-danger text-danger'>$error</div>"; } ?>

        <form id="loginForm" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="name" name="name" placeholder="Enter username" autocomplete="off" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" autocomplete="off" required>
            </div>
            <button type="submit" name="login">Login</button>
            <span>Don't have an account? <a href="register.php">Sign Up</a> now</span>
        </form>
    </div>
</div>

<?php
require "./layout/footer.php";
?>
