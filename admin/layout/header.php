<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- fontawesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- google font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=MonteCarlo&family=Mountains+of+Christmas:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background: #f5f6fa;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 110vh;
            background: #5f63f2;
            color: white;
            transition: 0.3s;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .menu-item {
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-item:hover {
            background: rgba(255,255,255,0.1);
        }

        .submenu {
            background: rgba(0,0,0,0.1);
            max-height: 0;
            overflow: hidden;
            transition: 0.3s;
        }

        .submenu a {
            display: block;
            padding: 12px 40px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .submenu a:hover {
            background: rgba(255,255,255,0.1);
        }

        .submenu.open {
            max-height: 200px;
        }

        /* MAIN */
        .main {
            flex: 1;
        }

        /* TOPBAR */
      
        .toggle-btn {
            font-size: 22px;
            cursor: pointer;
            margin-right: 20px;
        }

        /* CONTENT */
        .content {
            padding: 25px;
        }
        
        .card {
            background: white;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        /* TEXT HIDE WHEN COLLAPSED */
        .sidebar.collapsed .text {
            display: none;
        }

        .arrow {
            transition: 0.3s;
        }

        .rotate {
            transform: rotate(90deg);
        }
        /* th{
            font-weight: 600;
            white-space: nowrap;
        } */
            /* topbar admin */
        .admin-menu {
        /* position: relative;
        display: inline-block; */
        background: white;
        padding: 15px 25px;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        justify-content: space-between;
    }

    .admin-button {
        background: white;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }

    .dropdown {
        position: absolute;
        right: 0;
        top: 35px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        min-width: 120px;
    }

    .dropdown a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }

    .dropdown a:hover {
        background: #f5f5f5;
    }

    .hidden {
        display: none;
    }

    /* font */
    #welcome {
    font-family: "Playfair Display", serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }

    /* Cards  */

    .cards{
        margin-top:20px;
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
        gap:20px;
    }

    .card{
        padding:20px;
        border-radius:12px;
        color:white;
        box-shadow:0 4px 15px rgba(0,0,0,0.1);
    }

    .card i{
        font-size:30px;
        margin-bottom:10px;
    }

    .card h3{
        font-size:16px;
    }

    .card p{
        font-size:28px;
        font-weight:bold;
    }

    .card1{ background:linear-gradient(45deg,#36d1dc,#5b86e5); }
    .card2{ background:linear-gradient(45deg,#ff9966,#ff5e62); }
    .card3{ background:linear-gradient(45deg,#00b09b,#96c93d); }
    .card4{ background:linear-gradient(45deg,#7f00ff,#e100ff); }
    /*  Table  */

    .table-box{
        margin-top:30px;
        background:white;
        padding:25px;
        border-radius:10px;
        box-shadow:0 2px 10px rgba(0,0,0,0.05);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    table th, table td{
        padding:12px;
        text-align:left;
        border-bottom:1px solid #eee;
    }

    table th{
        background:#f8f9fc;
    }
    /* student create label */
    label {
        display: block !important;
        color: #000 !important;
        font-size: 16px !important;
    }

    .card-body h4{
        display: block !important;
        color: #000 !important;
        font-size: 23px !important;
    }

    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <span class="text">School</span>
        </div>

        <div class="menu-item">            
            <a href="./index.php" style="text-decoration: none; color:#ffff"><span><i class="fa-solid fa-house-chimney"></i> <span class="text">Dashboard</span></span> </a>
        </div>      
        <!-- teacher menu -->
        <div class="menu-item" id="teacherMenu">
            <span><i class="fa-solid fa-user-graduate"></i> <span class="text">Teachers</span></span>
            <span class="arrow" id="teacherArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="submenu" id="teacherSubmenu">
            <a href="teacher_create.php">Create Teacher</a>
            <a href="teacher_list.php">List Teacher</a>
        </div>

          <!-- STUDENTS MENU -->
        <div class="menu-item" id="studentMenu">
            <span><i class="fa-solid fa-user"></i> <span class="text">Students</span></span>
            <span class="arrow" id="studentArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>

        <div class="submenu" id="studentSubmenu">
            <a href="student_list.php">Student List</a>
            <a href="student_create.php">Create Student</a>
        </div>

        <!-- course menu -->
         <div class="menu-item" id="courseMenu">
            <span><i class="fa-solid fa-book-open"></i> <span class="text">Courses</span></span>
            <span class="arrow" id="courseArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="submenu" id="courseSubmenu">
            <a href="course_list.php">Course List</a>
            <a href="course_create.php">Create Course</a>
        </div>

        <!-- mark menu -->
        <div class="menu-item" id="markMenu">
            <span><i class="fa-solid fa-tag me-2"></i><span class="text">Mark</span></span>
            <span class="arrow" id="markArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="submenu" id="markSubmenu">
            <a href="">Mark List</a>
            <a href="">Create Mark</a>
        </div>

        <!-- user -->
         <div class="menu-item">            
            <a href="user_list.php" style="text-decoration: none; color:#ffff"><span> <i class="fa-solid fa-users"></i> <span class="text">Users</span></span> </a>
        </div>       

        <!-- logout -->
        <div class="ms-4">
            <a href="../index.php" style="text-decoration: none; color:#ffff">
         <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
             </a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="admin-menu">
            <span class="toggle-btn btn btn-outline-primary" id="toggleSidebar"><i class="fa-solid fa-bars"></i></span>            
            <button id="adminBtn" class="admin-button"><i class="fa-solid fa-user-tie me-2"></i>Admin</button>
      
            <div id="dropdown" class="dropdown hidden">
                <a href="../index.php">Logout</a>
            </div>

     
        </div>