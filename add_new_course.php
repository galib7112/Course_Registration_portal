<?php 
    session_start();
    require("database_connection.php");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>New Student Registration</title>
</head>
<body>
<?php 
    include("includes/header.php");
    include("includes/navbar.php");

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php
            include("includes/topbar.php");
        ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4 form-group col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Add New Course</h1>
            </div>
            <?php if (isset($_SESSION['add_new_course_success'])) : ?> 
                <div class="alert alert-success" role="alert" >
                    Course Added Successfully.
                </div> 
            <?php  unset($_SESSION['add_new_course_success']); endif ?>
            <div class="card">
                
                <div class="card-body">
                    <h4 class="card-title col-md-12">Enter Course Information</h4>
                    <hr class="mb-3 ">
                    <form method="POST" action="process2.php">
                        <div class="form-group col-md-12">
                            <label class="h6 mb-0 text-gray-800">Course Code</label>
                            <input type="text" class="form-control" name="course_code" id="course_code" placeholder="enter Course Code " required>
                                
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Course Title</h7></label>
                            <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Enter Course Title"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Credit</h7></label>
                            <input type="text" class="form-control" name="credit" id="credit" placeholder="Enter Course Credit"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Level</h7></label>
                            <input type="text" class="form-control" name="level" id="level" placeholder="Enter Level"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Term</h7></label>
                            <input type="text" class="form-control" name="term" id="term" placeholder="Enter Term"required>
                        </div>
                        <div class="d-flex h-100">
                            <div class="align-self-center mx-auto">
                                <button type="submit" name="add" id="add" class="btn btn-primary "  >Add Course</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>                
    </div>
<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
</body>
</html>
