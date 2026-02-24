<?php
require "../config/db_connection.php";

// Get teacher ID from URL
if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = intval($_GET['id']);

// Fetch teacher data
$sql = "SELECT * FROM courses WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Teacher not found.");
}

$course = $result->fetch_assoc();

// Handle form submission
if (isset($_POST['update'])) {
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $class = $conn->real_escape_string($_POST['class']);
    $teacher = $conn->real_escape_string($_POST['teacher']);
    $status = $conn->real_escape_string($_POST['status']);

    $updateSql = "UPDATE courses 
                  SET course_name='$course_name', class='$class', teacher='$teacher', status='$status'
                  WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        header("Location:course_list.php");
        exit;
    } else {
        echo "Error updating course: " . $conn->error;
    }
}
require "layout/header.php";
?>
    <div class="container mt-5">
        <div class="card shadow-sm h-100vh">
            <div class="card_body">
                <h2>Edit Course</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label>Course Name</label>
                            <input type="text" name="course_name" class="form-control" value="<?php echo htmlspecialchars($course['course_name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Class</label>
                            <input type="text" name="class" class="form-control" value="<?php echo htmlspecialchars($course['class']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Teacher</label>
                            <input type="text" name="teacher" class="form-control" value="<?php echo htmlspecialchars($course['teacher']); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" <?php if($course['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if($course['status'] == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div> 

                        <input type="submit" name="update" value="Update">
                    </form>
            </div>
        </div>
    </div>


<?Php require "layout/footer.php";?>