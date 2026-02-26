<?php
require "../config/db_connection.php";
require "../require/common.php";

if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $parent_name = $_POST['parent_name'];
    $status = $_POST['status'];

    // Basic validation
    if (empty($name) || empty($class) || empty($email)) {
        $error = "Name, Class, and Email are required!";
    } else {

        //  Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE user_name = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {

            // Email already exists
            $error = "Email already exists!";

        } else {

            $default_password = "student123";
            $default_role = "student";

            // Insert into users table
            $user = $conn->prepare("INSERT INTO users (user_name, password, role) VALUES (?, ?, ?)");
            $user->bind_param("sss", $email, $default_password, $default_role);

            if ($user->execute()) {

                $user_id = $conn->insert_id;

                // Insert into students table
                $stmt = $conn->prepare("INSERT INTO students 
                    (name, user_id, class, gender, date_of_birth, phone, email, parent_name, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param(
                    "sisssssss",
                    $name,
                    $user_id,
                    $class,
                    $gender,
                    $date_of_birth,
                    $phone,
                    $email,
                    $parent_name,
                    $status
                );

                if ($stmt->execute()) {
                    $success = "Student Created Successfully!";
                } else {
                    $error = "Student Error: " . $stmt->error;
                }

                $stmt->close();

            } else {
                $error = "User Error: " . $user->error;
            }
        }

        $check->close();
    }
}

require "layout/header.php";
?>

<div class="container mt-5">

    <div class="card shadow-sm h-100vh">
        <div class="card-body">

            <h4 class="mb-4">Create Student</h4>

            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Class</label>
                    <input type="text" name="class" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Parent Name</label>
                    <input type="text" name="parent_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="create">Save Student</button>

            </form>

        </div>
    </div>

</div>
<?php
    require "layout/footer.php";
?>