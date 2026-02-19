<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body {
            overflow-x: hidden;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        #content {
            transition: all 0.3s;
        }

        .sidebar-link {
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            color: #333;
        }

        .sidebar-link:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div id="sidebar" class="bg-light border-end">
        <div class="p-3">
            <h4>Dashboard</h4>
        </div>

        <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#admin" role="button">
            Student
            <span><i class="fa-solid fa-angle-right"></i></span>
        </a>
        <div class="collapse ps-3" id="admin">
            <a href="#" class="sidebar-link">Change Password</a>
        </div>

        <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#course"  role="button">
            Courses
            <span><i class="fa-solid fa-angle-right"></i></span>
        </a>
        <div class="collapse ps-3" id="course">
            <a href="#" class="sidebar-link">List</a>
        </div>
        <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#teacher" role="button">
            Teachers
            <span><i class="fa-solid fa-angle-right"></i></span>
        </a>
        <div class="collapse ps-3" id="teacher">
            <a href="#" class="sidebar-link">List</a>
        </div>

        <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#student" role="button">
            Students
            <span><i class="fa-solid fa-angle-right"></i></span>
        </a>
        <div class="collapse ps-3" id="student">
            <a href="#" class="sidebar-link">List</a>
        </div>
    </div>

    <!-- Content -->
    <div id="content" class="flex-grow-1">
        <!-- Top Navbar -->
        <nav class="navbar navbar-light bg-white border-bottom px-3">
            <button id="toggleBtn" class="btn btn-outline-primary">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="ms-3 fw-bold">My Dashboard</span>
        </nav>
        <!-- Main Content -->
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text fs-4">1,245</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <p class="card-text fs-4">$8,430</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text fs-4">320</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>

</body>
</html>
