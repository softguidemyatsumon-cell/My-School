<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            height: 100vh;
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
        .topbar {
            background: white;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            justify-content: space-between;
        }

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
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <span class="text">School</span>
        </div>

        <div class="menu-item">
            <span><i class="fa-solid fa-house-chimney"></i> <span class="text">Dashboard</span></span>
        </div>

        <!-- STUDENTS MENU -->
        <div class="menu-item" id="studentMenu">
            <span><i class="fa-solid fa-graduation-cap"></i> <span class="text">Students</span></span>
            <span class="arrow" id="studentArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>

        <div class="submenu" id="studentSubmenu">
            <a href="#">List Students</a>
            <a href="#">Create Student</a>
        </div>
        <!-- teacher menu -->
        <div class="menu-item" id="teacherMenu">
            <span><i class="fa-solid fa-user-graduate"></i> <span class="text">Teachers</span></span>
            <span class="arrow" id="teacherArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="submenu" id="teacherSubmenu">
            <a href="#">List Teacher</a>
            <a href="#">Create Teacher</a>
        </div>
        <!-- course menu -->
         <div class="menu-item" id="courseMenu">
            <span><i class="fa-solid fa-book-open"></i> <span class="text">Courses</span></span>
            <span class="arrow" id="courseArrow"><i class="fa-solid fa-angle-right"></i></span>
        </div>
        <div class="submenu" id="courseSubmenu">
            <a href="#">List Course</a>
            <a href="#">Create Course</a>
        </div>
        <!-- logout -->
        <div class="menu-item btn btn-danger ms-3" style="width: 90%;">
         <i class="fa-solid fa-right-from-bracket "></i>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <span class="toggle-btn btn btn-outline-primary" id="toggleSidebar"><i class="fa-solid fa-bars"></i></span>            
            <div><i class="fa-solid fa-user-tie me-2"></i>Admin</div>
        </div>