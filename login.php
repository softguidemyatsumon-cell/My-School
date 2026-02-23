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
    // $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <!-- Navbar -->
  <nav>
    <div class="logo">My School</div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#courses">Courses</a></li>
      <li><a href="#teachers">Teachers</a></li>
      <li><a href="#testimonials">Testimonials</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a class="sign-in-btn" href="./login.php">
        <i class="fa-solid fa-user-lock me-2"></i>Sign in
    </a>
  </nav>
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
                <span class="mt-5">Don't have an account? <a href="register.php">Sign Up</a> now</span>
            </form>
        </div>
    </div>
<!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>My School</h3>
            <p>Empowering learners with practical skills and modern education.</p>
        </div>

        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Teachers</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Contact</h4>
            <p>Email: info@myschool.com</p>
            <p>Phone: +1 234 567 890</p>
            <p>Address:No(575B),Kamayut Township, Yangon , Myanmar</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2026 My School. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>

