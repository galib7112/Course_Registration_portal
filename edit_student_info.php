<?php 
    require("database_connection.php"); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Information Update</title>
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
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4 form-group col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Edit Student's Information</h1>
            </div>
            
                <?php
                    if(isset($_POST['edit'])){
                        
                        $student_id  = $_POST['edit_id'];
                        $sql = "SELECT * FROM studentlist WHERE student_id = '$student_id'";
                        $result = $conn->query($sql);
                        foreach($result as $row){
                            ?>
                            <div class="card">
                                <div class="card-body"> 
                                    <h4 class="card-title col-md-6">Student Information</h4>
                                    <hr class="mb-3 ">
                                    <form method="POST" action="update_student_info.php">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label >Student Id</label>
                                                <input type="text" class="form-control" id="st_id" value="<?php echo $row['student_id']?>"disabled>
                                            </div>
                                             
                                            <div class="form-group col-md-6">
                                                <label>Department</label>
                                                <input type="text" class="form-control" value= "<?php echo $row['department']?>"disabled>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label >First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control"name="last_name" value="<?php echo $row['last_name']?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control"name="email" value= "<?php echo $row['email']?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value= "<?php echo $row['phone']?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Shift</label>
                                                <select id="shift" name="shift" class="form-control">
                                                    <option selected><?php echo $row['shift']?></option>
                                                    <option>Day</option>
                                                    <option>Evening</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Batch</label>
                                                <input type="text" class="form-control " name="batch" value= "<?php echo $row['batch'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex h-100">
                                            <div class="align-self-center mx-auto">
                                                <input type="hidden" name="update_id" id="update_id" value="<?php echo $student_id?>">
                                                <button type="submit" name="update" id="update" class="btn btn-primary ">Update</button>
                                            </div>                                            
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <?php
                           
                        }

                    }
                ?>
        </div>

                
    </div>
    <!-- End of Main Content -->
<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
</body>
</html>
