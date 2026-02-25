<?php
    require "../config/db_connection.php";
    require "../require/common.php";

    $sql=mysqli_query($conn,"SELECT * FROM teachers");

    require "layout/header.php";
?>
    <div class="content-body">
    <div class="container-fluid">
        <div class="justify-content-between d-flex mb-3 mt-5">
            <h1>Teachers List</h1>
            <a href="<?= $admin_base_url . 'teacher_create.php' ?>" class="btn btn-primary">
                Create Teacher
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
                                    <th class="col-2">Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Qualification</th>
                                    <th>Date of joining</th>
                                    <th>Salary</th>
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
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['gender']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['phone']?></td>
                                    <td><?=$row['qualification']?></td>
                                    <td><?=$row['join_date']?></td>
                                    <td><?=$row['salary']?></td>
                                    <td>
                                        <a href="teacher_edit.php?id=<?= $row['id']; ?>" class="text-primary text-decoration-none me-3"><i class="fa-regular fa-pen-to-square me-1"></i>Update</a>
                                        <a href="teacher_delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this teacher?');" class="text-danger text-decoration-none">
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