<?php 
    require("database_connection.php"); 
    session_start();
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
                <h1 class="h3 mb-0 text-gray-800">Add New Student</h1>
            </div>
            <?php if (isset($_SESSION['new_student_reg_success'])) : ?> 
                <div class="alert alert-success" role="alert" >
                    Student Added Successfully.
                </div> 
            <?php  unset($_SESSION['new_student_reg_success']); endif ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title col-md-12">Enter Student Information</h4>
                    <hr class="mb-3 ">
                    <form method="POST" action="process.php">
                        <div class="form-group col-md-12">
                            <label class="h6 mb-0 text-gray-800">Student Id</label>
                            <input type="text" class="form-control" name="student_id" id="student_id" placeholder="enter Stduent ID " required>
                                
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">First Name</h7></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Last Name</h7></label>
                            <input type="text" class="form-control" name="last_name" id="first_name" placeholder="Enter Last Name"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Email address</h7></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Phone Number</h7></label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Student Phone Number"required>
                        </div>
                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Department</h7></label>
                            <input type="text" class="form-control" name="department" id="department" placeholder="Enter Department"required>                                
                        </div>
                        <div class="form-group col-md-12">
                            <label > <h7 class="h7 mb-0 text-gray-800">Shift</h7></label>
                            <select id="shift" name="shift" class="form-control">
                                <option selected>Day</option>
                                <option>Evening</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label><h7 class="h7 mb-0 text-gray-800">Batch</h7></label>
                            <input type="text" class="form-control" name="batch" id="batch" placeholder="Enter Batch"required>
                        </div>
                       
                        <div class="d-flex h-100">
                            <div class="align-self-center mx-auto">
                                <button type="submit" name="add" id="add" class="btn btn-primary "  >Add Student</button>
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
