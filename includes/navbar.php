<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-1">Course Register Portal</div>
    </a>

    <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt" style='font-size:15px'></i>
                <span>Dashboard</span>
            </a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        content
    </div>

    <!-- Nav Item - Add New Student -->
    <li class="nav-item">
        <a class="nav-link" href="new_student_registration.php">
            <i class="fas fa-fw fa-user-plus" style='font-size:15px'></i>
            <span><b>Add New Student</b></span></a>
    </li>

    <!-- Nav Item - Student List -->
    <li class="nav-item">
        <a class="nav-link" href="student_list.php">
            <i class="fas fa-fw fa-users" style='font-size:15px'></i>
            <span><b>Student List</b></span></a>
    </li>
   
    
    <!-- Nav Item - Course Registration -->
    <li class="nav-item">
        <a class="nav-link" href="course_registration.php">
            <i class="fas fa-fw fa-book-reader" style='font-size:15px'></i>
            <span><b>Course Registration</b></span></a>
    </li>
    <!-- Nav Item - Add New Courses -->
    <li class="nav-item">
        <a class="nav-link" href="add_new_course.php">
            <i class="fas fa-fw fa-book" style='font-size:15px'></i>
            <span><b>Add New Course</b></span></a>
    </li>
    <!-- Nav Item - course List-->
    <li class="nav-item">
        <a class="nav-link" href="course_list.php">
            <i class="fas fa-fw fa-user-edit" style='font-size:15px'></i>
            <span><b>Course List</b></span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
