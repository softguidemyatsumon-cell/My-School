<?php
require "../config/db_connection.php";
require "../require/common.php";

function old($key) {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : '';
}

if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $join_date = $_POST['join_date'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];

    //  Basic validation
    if (empty($name) || empty($email)) {
        $error = "Name and Email are required!";
    } else {

        //  Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE user_name = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {

            // Email exists
            $error = "Email already exists!";

        } else {

            $default_password = password_hash("teacher123", PASSWORD_DEFAULT);
            $default_role = "teacher";

            // Insert user
            $user = $conn->prepare("INSERT INTO users (user_name, password, role) VALUES (?, ?, ?)");
            $user->bind_param("sss", $email, $default_password, $default_role);

            if ($user->execute()) {

                $user_id = $conn->insert_id;

                // Insert teacher
                $stmt = $conn->prepare("INSERT INTO teachers 
                    (name, user_id, gender, email, phone, qualification, join_date, salary, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param(
                    "sisssssds",
                    $name,
                    $user_id,
                    $gender,
                    $email,
                    $phone,
                    $qualification,
                    $join_date,
                    $salary,
                    $status
                );

                if ($stmt->execute()) {
                    $success = "Teacher Created Successfully!";
                } else {
                    $error = "Teacher Error: " . $stmt->error;
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

            <h4 class="mb-4">Create Teacher</h4>

            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= old('name') ?>">
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>">
                </div>

                <div class="mb-3">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control" value="<?= old('qualification') ?>">
                </div>

                <div class="mb-3">
                    <label>Date of Joining</label>
                    <input type="date" name="join_date" class="form-control" value="<?= old('join_date') ?>">
                </div>

                <div class="mb-3">
                    <label>Salary</label>
                    <input type="number" name="salary" class="form-control" value="<?= old('salary') ?>">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="create">Save Teacher</button>

            </form>

        </div>
    </div>

</div>
<?php
    require "layout/footer.php";
?>