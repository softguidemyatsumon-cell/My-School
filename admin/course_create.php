<?php
require "../config/db_connection.php";
require "../require/common.php";

if (isset($_POST['create'])) {

    $course_name = $_POST['course_name'];
    $class = $_POST['class'];
    $teacher = $_POST['teacher'];
    $status = $_POST['status'];

  // Check required fields
    if (!empty($course_name) && !empty($class)) {

        $stmt = $conn->prepare("INSERT INTO courses (course_name, class, teacher, status) 
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $course_name, $class, $teacher, $status);

        // Execute the statement
        if ($stmt->execute()) {
            $success = "Course Created Successfully!";
        } else {
            $error = "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();

    } else {
        $error = "Course Name and Class are required!";
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
                    <label>Course Name</label>
                    <input type="text" name="course_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Class</label>
                    <input type="text" name="class" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Teacher</label>
                    <input type="text" name="teacher" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="create">Save Course</button>

            </form>

        </div>
    </div>

</div>
<?php
    require "layout/footer.php";
?>