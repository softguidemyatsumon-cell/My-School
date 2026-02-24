<?php
require "../config/db_connection.php";
$id = $_GET['id'];
$sql=mysqli_query($conn, "DELETE FROM students WHERE id=$id");
if($sql){
    header("Location: student_list.php");
}
?>
