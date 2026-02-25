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

    const markMenu = document.getElementById("markMenu");
    const markSubmenu = document.getElementById("markSubmenu");
    const markArrow = document.getElementById("markArrow");

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

    // Mark submenu collespe
     markMenu.onclick = () => {
        markSubmenu.classList.toggle("open");
        markArrow.classList.toggle("rotate");
    };

    const adminBtn = document.getElementById("adminBtn");
    const dropdown = document.getElementById("dropdown");

    adminBtn.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
    });

    // Optional: Close when clicking outside
    document.addEventListener("click", (event) => {
        if (!adminBtn.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });

</script>

</body>
</html>