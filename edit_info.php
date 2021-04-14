<?php 
    require("database_connection.php"); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Information Edit</title>
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
                <h1 class="h3 mb-0 text-gray-800">Edit Information</h1>
            </div>
            
                <?php
                    if(isset($_POST['update'])){
                        
                        $update_id  = $_POST['update_id'];
                        $sql = "SELECT * FROM register_course WHERE id = '$update_id'";
                        $result = $conn->query($sql);
                        foreach($result as $row){
                            $c_code = $row['course_code'];
                            $sql1 = "SELECT * FROM courselist WHERE course_code = '$c_code'";
                            $result1 = $conn->query($sql1);
                            foreach($result1 as $row1){
                                ?>
                                <div class="card">
                                    <div class="card-body"> 
                                        <h4 class="card-title col-md-6">Course Information</h4>
                                        <hr class="mb-3 ">
                                        <form method="POST" action="update_course_info.php">
                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Course Code</label>
                                                    <input type="text" class="form-control" id="st_id" value="<?php echo $row['course_code']?>"disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Course Title</label>
                                                    <input type="text" class="form-control"  value="<?php echo $row1['course_title']?>"disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Credit</label>
                                                    <input type="text" class="form-control" value="<?php echo $row1['credit']?>"disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Semester</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['semester']?>"disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Registration Status</label>
                                                    <select id="reg_status" name="reg_status" class="form-control " required>
                                                        <option selected><?php echo $row['reg_status']?></option>
                                                        <option>Completed</option>
                                                        <option>Panding</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Course Status</label>
                                                    <select id="course_status" name="course_status" class="form-control " required>
                                                        <option selected><?php echo $row['status']?></option>
                                                        <option>Completed</option>
                                                        <option>In Progress</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                     <label >SGPA</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['sgpa']?>" name="sgpa">
                                                </div>
                                            </div>
                                            <div class="d-flex h-100">
                                                <div class="align-self-center mx-auto">
                                                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id?>">
                                                    <button type="submit" name="update" id="update" class="btn btn-primary ">Update</button>
                                                </div>                                            
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <?php
                            }
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
