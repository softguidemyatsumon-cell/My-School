<?php
require "../config/db_connection.php";

// Get teacher ID from URL
if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = intval($_GET['id']);

// Fetch teacher data
$sql = "SELECT * FROM teachers WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Teacher not found.");
}

$teacher = $result->fetch_assoc();

$teacher_user_id=$teacher['user_id'];
$user_name= mysqli_query($conn,"SELECT user_name FROM users WHERE id=$teacher_user_id");

// Handle form submission
if (isset($_POST['update'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $join_date = $conn->real_escape_string($_POST['join_date']);
    $salary = $conn->real_escape_string($_POST['salary']);
    $status = $conn->real_escape_string($_POST['status']);

    if($user_name !=$email){
        $sql=mysqli_query($conn,"UPDATE users SET user_name ='$email' WHERE id=$teacher_user_id ");    
    }

    mysqli_query($conn, "UPDATE teachers 
                  SET name='$name', gender='$gender', email='$email', phone='$phone', qualification='$qualification',
                  join_date='$join_date', salary='$salary', status='$status'
                  WHERE id=$id");    

        header("Location:teacher_list.php");
        exit();
    } 

require "layout/header.php";
?>
    <div class="container mt-5">
        <div class="card shadow-sm h-100vh">
            <div class="card_body">
                <h2>Edit Teacher</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($teacher['name']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male" <?php if($teacher['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if($teacher['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($teacher['email']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($teacher['phone']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Qualification</label>
                            <input type="text" name="qualification" class="form-control" value="<?php echo htmlspecialchars($teacher['qualification']); ?>">
                        </div>

                        <div class="mb-3">
                            <label>Date of Joining</label>
                            <input type="date" name="join_date" class="form-control" value="<?php echo $teacher['join_date']; ?>">
                        </div>

                        <div class="mb-3">
                            <label>Salary</label>
                            <input type="number" name="salary" class="form-control" value="<?php echo $teacher['salary']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" <?php if($teacher['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if($teacher['status'] == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div> 

                        <input type="submit" name="update" class="btn btn-primary " value="Update">
                    </form>
            </div>
        </div>
    </div>


<?Php require "layout/footer.php";?>