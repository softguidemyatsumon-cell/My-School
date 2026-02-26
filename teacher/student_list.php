<?php
    require "../config/db_connection.php";
    require "../require/common.php";

    $sql=mysqli_query($conn,"SELECT * FROM students");

    require "layout/header.php";
?>
    <div class="content-body">
    <div class="container-fluid">
        <div class="justify-content-between d-flex mb-3 mt-5">
            <h1>Student List</h1>
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
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Parent Name</th>
                                    <th>Status</th>
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
                                    <td><?=$row['class']?></td>
                                    <td><?=$row['gender']?></td>
                                    <td><?=$row['date_of_birth']?></td>
                                    <td><?=$row['phone']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['parent_name']?></td>
                                    <td><?=$row['status']?></td>
                                 
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