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