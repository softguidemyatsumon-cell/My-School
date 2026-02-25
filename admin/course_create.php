<?php
require "../config/db_connection.php";
require "../require/common.php";

if (isset($_POST['create'])) {

    $course_name = $_POST['course_name'];
    // $class = $_POST['class'];
    // $teacher = $_POST['teacher'];
    // $status = $_POST['status'];

  // Check required fields
    if (!empty($course_name)) {

        $stmt = $conn->prepare("INSERT INTO courses (course_name) 
        VALUES (?)");
        $stmt->bind_param("s", $course_name);

        // Execute the statement
        if ($stmt->execute()) {
            $success = "Course Created Successfully!";
        } else {
            $error = "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();

    } else {
        $error = "Course Name is required!";
    }
}
require "layout/header.php";
?>

<div class="container mt-5">

    <div class="card shadow-sm h-100vh">
        <div class="card-body">

            <h4 class="mb-4">Create Course</h4>

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
                <!-- <div class="mb-3">
                    <label>Class</label>
                    <input type="text" name="class" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Teacher</label>
                    <select name="teacher" class="form-select">
                        <option value="#">Daw Mya</option>
                        <option value="#">Daw Hla</option>
                        <option value="#">Daw Su</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div> -->
                <button class="btn btn-primary" name="create">Save Course</button>

            </form>

        </div>
    </div>

</div>
<?php
    require "layout/footer.php";
?>