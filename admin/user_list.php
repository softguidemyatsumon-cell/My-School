<?php
require "../config/db_connection.php";
require "../require/common.php";

/* ---------- Pagination Settings ---------- */
$limit = 10; // rows per page

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

/* ---------- Count Total Rows ---------- */
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$totalRow = mysqli_fetch_assoc($totalQuery);
$totalRows = $totalRow['total'];

$totalPages = ceil($totalRows / $limit);

/* ---------- Fetch Paginated Data ---------- */
$sql = mysqli_query($conn, "SELECT * FROM users LIMIT $limit OFFSET $offset");

require "layout/header.php";
?>

<div class="content-body">
<div class="container-fluid">
    <div class="justify-content-between d-flex mb-3 mt-5">
        <h1>Users List</h1>
    </div>

    <div class="row">            
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no = $offset + 1; // keeps numbering correct

                        while ($row = mysqli_fetch_assoc($sql)):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['user_name']) ?></td>
                                <td><?= htmlspecialchars($row['password']) ?></td>
                                <td><?= htmlspecialchars($row['role']) ?></td>
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
                                <td colspan="5" class="text-center">No users found</td>
                            </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>

                    <!-- ✅ Pagination UI -->
                    <nav>
                        <ul class="pagination">

                            <!-- Prev Button -->
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
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

                            <!-- Next Button -->
                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php require "layout/footer.php"; ?>