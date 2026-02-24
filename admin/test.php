<?php
require "../config/db_connection.php";
require "../require/common.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $date_of_joining = $_POST['date_of_joining'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];

    if (!empty($name) && !empty($email)) {

        $sql = "INSERT INTO teachers 
                (name, gender, email, phone, qualification, date_of_joining, salary, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $gender, $email, $phone, $qualification, $date_of_joining, $salary, $status]);

        $success = "Teacher Created Successfully!";
    } else {
        $error = "Name and Email are required!";
    }
}
require "layout/header.php";
?>

<div class="container mt-5">

    <div class="card shadow-sm">
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
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Date of Joining</label>
                    <input type="date" name="date_of_joining" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Salary</label>
                    <input type="number" name="salary" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save Teacher</button>

            </form>

        </div>
    </div>

</div>
<?php
    require "layout/footer.php";
?>