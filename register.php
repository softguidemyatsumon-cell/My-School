<?php
require "./config/db_connection.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_name = trim($_POST['user_name']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    /* ---------- Validation ---------- */
    if (empty($user_name) || empty($password) || empty($role)) {
        $error = "All fields are required.";
    } 
    else {

        /* ---------- Check Duplicate User ---------- */
        $checkQuery = mysqli_query($conn, 
            "SELECT id FROM register WHERE user_name = '$user_name'"
        );

        if (mysqli_num_rows($checkQuery) > 0) {
            $error = "Username already exists.";
        } 
        else {

            /* ---------- Hash Password (CRITICAL) ---------- */
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            /* ---------- Insert User ---------- */
            $insertQuery = mysqli_query($conn,
                "INSERT INTO register (user_name, password, role) 
                 VALUES ('$user_name', '$hashedPassword', '$role')"
            );

            if ($insertQuery) {
                $success = "Registration successful!";
            } else {
                $error = "Something went wrong.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h3 class="mb-3">User Registration</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="user_name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="user">User</option>
                </select>
            </div>

            <button class="btn btn-primary">Register</button>

        </form>
    </div>
</div>

</body>
</html>