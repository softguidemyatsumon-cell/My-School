<?php
require "../config/db_connection.php";

// Get teacher ID from URL
if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = intval($_GET['id']);

// Fetch teacher data
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Teacher not found.");
}

$student = $result->fetch_assoc();

// Handle form submission
if (isset($_POST['update'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $class = $conn->real_escape_string($_POST['class']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $date_of_birth = $conn->real_escape_string($_POST['date_of_birth']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $parent_name = $conn->real_escape_string($_POST['parent_name']);
    $status = $conn->real_escape_string($_POST['status']);

    $updateSql = "UPDATE students 
                  SET name='$name', class='$class', gender='$gender', date_of_birth='$date_of_birth', phone='$phone', email='$email',
                  parent_name='$parent_name', status='$status'
                  WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        header("Location:student_list.php");
        exit;
    } else {
        echo "Error updating student: " . $conn->error;
    }
}
require "layout/header.php";
?>
    <div class="container mt-5">
        <div class="card shadow-sm h-100vh">
            <div class="card_body">
                <h2>Edit Student</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Class</label>
                            <input type="text" name="class" class="form-control" value="<?php echo htmlspecialchars($student['class']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male" <?php if($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Date Of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="<?php echo htmlspecialchars($student['date_of_birth']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($student['phone']); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($student['email']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Parent Name</label>
                            <input type="text" name="parent_name" class="form-control" value="<?php echo htmlspecialchars($student['parent_name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" <?php if($student['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if($student['status'] == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div> 

                        <input type="submit" name="update" class="btn btn-primary float-end" value="Update">
                    </form>
            </div>
        </div>
    </div>


<?Php require "layout/footer.php";?>