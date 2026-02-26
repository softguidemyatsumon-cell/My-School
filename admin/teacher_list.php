<?php
require "../config/db_connection.php";
require "../require/common.php";

/* ---------- Pagination Setup ---------- */
$limit = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

/* ---------- Total Rows ---------- */
$countQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM teachers");
$countData = mysqli_fetch_assoc($countQuery);
$totalRows = $countData['total'];

$totalPages = ceil($totalRows / $limit);

/* Prevent page overflow */
if ($page > $totalPages && $totalPages > 0) {
    $page = $totalPages;
    $offset = ($page - 1) * $limit;
}

/* ---------- Fetch Data ---------- */
$sql = mysqli_query($conn, "SELECT * FROM teachers LIMIT $limit OFFSET $offset");

require "layout/header.php";
?>

<div class="content-body">
<div class="container-fluid">
    <div class="justify-content-between d-flex mb-3 mt-5">
        <h1>Teachers List</h1>
        <a href="<?= $admin_base_url . 'teacher_create.php' ?>" class="btn btn-primary">
            <i class="fa-solid fa-plus me-3 pt-2"></i>Add Teacher
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
                        $no = $offset + 1;

                        while ($row = mysqli_fetch_assoc($sql)):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['gender']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['qualification']) ?></td>
                                <td><?= htmlspecialchars($row['join_date']) ?></td>
                                <td><?= htmlspecialchars($row['salary']) ?></td>
                                <td>
                                    <a href="teacher_edit.php?id=<?= $row['id']; ?>" 
                                       class="text-primary text-decoration-none me-3">
                                       <i class="fa-regular fa-pen-to-square me-1"></i>Update
                                    </a>

                                    <a href="teacher_delete.php?id=<?= $row['id']; ?>" 
                                       onclick="return confirm('Are you sure you want to delete this teacher?');"
                                       class="text-danger text-decoration-none">
                                       <i class="fa-solid fa-trash-can me-1"></i>Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>

                        <?php if ($totalRows == 0): ?>
                            <tr>
                                <td colspan="9" class="text-center">No teachers found</td>
                            </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>

                    <!-- ✅ Pagination Controls -->
                    <?php if ($totalPages > 1): ?>
                        <nav>
                            <ul class="pagination">

                                <!-- Previous -->
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                                            Previous
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <!-- Page Numbers -->
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <!-- Next -->
                                <?php if ($page < $totalPages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                                            Next
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php require "layout/footer.php"; ?>