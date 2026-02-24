<?php
require "../config/db_connection.php";
$id = $_GET['id'];
$sql=mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
if($sql){
    header("Location: course_list.php");
}
?>
