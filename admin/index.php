<?php
    require ("layout/header.php");
?>
    
    <!-- CONTENT -->
    <div class="content">
        <span class="card shadow-sm text-primary fs-4 font-poppins" id="welcome">Welcome  Admin Dashboard</span>
        <div class="cards">

            <div class="card card1">
                <i class="fa fa-user-graduate"></i>
                <h3>Total Students</h3>
                <p>120</p>
            </div>

            <div class="card card2">
                <i class="fa fa-chalkboard-teacher"></i>
                <h3>Total Teachers</h3>
                <p>15</p>
            </div>

            <div class="card card3">
                <i class="fa fa-school"></i>
                <h3>Total Classes</h3>
                <p>10</p>
            </div>

            <div class="card card4">
                <i class="fa fa-book"></i>
                <h3>Total Subjects</h3>
                <p>25</p>
            </div>
        </div>
    </div>
     <!-- Table -->
    <div class="table-box">
        <h3>Recent Students</h3>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Aung Aung</td>
                <td>Grade 10</td>
                <td>Active</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Su Su</td>
                <td>Grade 9</td>
                <td>Active</td>
            </tr>
        </table>
    </div>        
<?php
    require ("layout/footer.php");
?>


