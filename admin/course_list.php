<?php
    require "../config/db_connection.php";
    require "../require/common.php";

    $sql=mysqli_query($conn,"SELECT * FROM courses");

    require "layout/header.php";
?>
    <div class="content-body">
    <div class="container-fluid">
        <div class="justify-content-between d-flex mb-3 mt-5">
            <h1>Course List</h1>
            <a href="<?= $admin_base_url . 'course_create.php' ?>" class="btn btn-primary">
                <i class="fa-solid fa-plus me-3 pt-2"></i>Add Course
            </a>
        </div>

        <div class="row">            
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="col-3">Course Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                while($row=mysqli_fetch_assoc($sql)):
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?=$row['course_name']?></td>
                                    <td><?=$row['status']?></td>
                                    <td>
                                        <a href="course_edit.php?id=<?= $row['id']; ?>" class="text-primary me-3 text-decoration-none"><i class="fa-regular fa-pen-to-square me-1"></i>Update</a>
                                        <a href="course_delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this teacher?');" class="text-danger text-decoration-none">
                                            <i class="fa-solid fa-trash-can me-1"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
    require "layout/footer.php";
?>