<?php
require "../config/db_connection.php";
$id = $_GET['id'];
$sql=mysqli_query($conn, "DELETE FROM teachers WHERE id=$id");
if($sql){
    header("Location: teacher_list.php");
}
?>
