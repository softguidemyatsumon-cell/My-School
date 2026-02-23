</div>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");

    const studentMenu = document.getElementById("studentMenu");
    const studentSubmenu = document.getElementById("studentSubmenu");
    const studentArrow = document.getElementById("studentArrow");

    const teacherMenu = document.getElementById("teacherMenu");
    const teacherSubmenu = document.getElementById("teacherSubmenu");
    const teacherArrow = document.getElementById("teacherArrow");

    const courseMenu = document.getElementById("courseMenu");
    const courseSubmenu = document.getElementById("courseSubmenu");
    const courseArrow = document.getElementById("courseArrow");

    /* SIDEBAR COLLAPSE */
    toggleSidebar.onclick = () => {
        sidebar.classList.toggle("collapsed");
    };

    /* STUDENT SUBMENU COLLAPSE */
    studentMenu.onclick = () => {
        studentSubmenu.classList.toggle("open");
        studentArrow.classList.toggle("rotate");
    };
    // teacher submenu collespe
    teacherMenu.onclick = () => {
        teacherSubmenu.classList.toggle("open");
        teacherArrow.classList.toggle("rotate");
    };
    
    // course submenu collespe
     courseMenu.onclick = () => {
        courseSubmenu.classList.toggle("open");
        courseArrow.classList.toggle("rotate");
    };
</script>

</body>
</html>