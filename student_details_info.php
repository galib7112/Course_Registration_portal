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
    <title>Student Information</title>
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
                <h1 class="h3 mb-0 text-gray-800">Student Information</h1>
            </div>
            
                <?php
                    if(isset($_POST['view']) or isset($_SESSION['update_student_info_success']) or isset($_SESSION['update_course_success'])){
                        if (isset($_SESSION['update_student_info_success'])){
                            $_POST['view_id'] = $_SESSION['update_student_info_success'];
                        }
                        if (isset($_SESSION['update_student_info_success2'])){
                            ?> 
                                <div class="alert alert-success" role="alert" >
                                    Student Info Update Successfully.
                                </div> 
                            <?php  unset($_SESSION['update_student_info_success2']);
                        }
                        if(isset($_SESSION['update_course_success'])){
                            $_POST['view_id'] = $_SESSION['update_course_success'];
                        }
                        if (isset($_SESSION['update_course_success1'])){
                            ?> 
                                <div class="alert alert-success" role="alert" >
                                    Course Info Update Successfully.
                                </div> 
                            <?php  unset($_SESSION['update_course_success1']);
                        }
                        if (isset($_SESSION['delete_reg_course_success1'])){
                            ?> 
                                <div class="alert alert-danger" role="alert" >
                                    Course Deleted Successfully.
                                </div> 
                            <?php  unset($_SESSION['delete_reg_course_success1']);
                        }
                        $cgpa = 'N/A';
                        $student_id  = $_POST['view_id'];
                        unset($_SESSION['update_student_info_success']);
                        unset($_SESSION['update_course_success']);
                        $sql = "SELECT * FROM studentlist WHERE student_id='$student_id'";
                        $result = $conn->query($sql);
                        foreach($result as $row){
                            $sql1 = "SELECT  course_code,sgpa, status FROM register_course WHERE student_id = '$student_id'";
                            $result1 = $conn->query($sql1);
                            $x =0.0;
                            $y = 0.0;
                            $z = 0;
                            if($result1->num_rows>0){
                                while($row1 = $result1 -> fetch_assoc()){
                                    
                                    $status = $row1['status'];
                                    if($status == "Completed"){
                                        $course_code = $row1['course_code'];
                                        $sql2 = "SELECT * FROM courselist WHERE course_code='$course_code'";
                                        $result2 = $conn->query($sql2);
                                        
                                        foreach($result2 as $row2){
                                            $x += ($row1['sgpa']*$row2['credit']);
                                            $y += $row2['credit'];
                                            
                                        }

                                    }
                                    else if($status == "In Progres"){
                                        $course_code = $row1['course_code'];
                                        $sql2 = "SELECT * FROM courselist WHERE course_code='$course_code'";
                                        $result2 = $conn->query($sql2);
                                        foreach($result2 as $row2){
                                            $z += $row2['credit'];
                                        }
                                    }
                                    
                                }
                            }
                            if($y>0){
                                $cgpa = round($x/$y,2);
                            }
                                      
                            ?>
                            <div class="card">
                                <div class="card-body"> 
                                    <div class="d-flex h-100">
                                        <h4 class="card-title col-md-6">Student Information</h4>
                                        <div class="align-self-end ml-auto">
                                            <form action="edit_student_info.php" method="POST">
                                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $student_id ?>">
                                                <button type="submit" name="edit" id="edit"class="btn btn-primary" style='font-size:15px'>EDIT</button>
                                            </form>

                                        </div>
                                    </div>
                                    <hr class="mb-3 ">
                                    <form method="POST" action="student_details_info.php">
                                        

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label >Student Id</label>
                                                <input type="text" class="form-control" id="st_id" value="<?php echo $row['student_id']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >First Name</label>
                                                <input type="text" class="form-control"  value="<?php echo $row['first_name']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $row['last_name']?>"disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value= "<?php echo $row['email']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" value= "<?php echo $row['phone']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>CGPA</label>
                                                <input type="text" class="form-control" value= "<?php echo $cgpa?>"disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Department</label>
                                                <input type="text" class="form-control" value= "<?php echo $row['department']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Shift</label>
                                                <input type="text" class="form-control" value= "<?php echo $row['shift']?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Batch</label>
                                                <input type="text" class="form-control " value= "<?php echo $row['batch'] ?>"disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Total Completed Credit</label>
                                                <input type="text" class="form-control" value= "<?php echo $y?>"disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Total Registerd Credit</label>
                                                <input type="text" class="form-control" value= "<?php echo $z?>"disabled>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title col-md-6">Registerd Courses</h4>
                                    <hr class="mb-3 ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Credit</th>
                                                    <th>Type</th> 
                                                    <th>Section</th> 
                                                    <th>Registration Status</th>
                                                    <th>Update</th> 
                                                    <th>Delete</th>
                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $s_id 	 = $row['student_id'];
                                                    $sql1 = "SELECT id, course_code, type, section, semester, sgpa, status, reg_status FROM register_course WHERE student_id = '$s_id'";
                                                    $result1 = $conn->query($sql1);
                                                    $n = 0;
                                                    if($result1->num_rows>0){
                                                        while($row1 = $result1 -> fetch_assoc()){
                                                            
                                                            $status = $row1['status'];
                                                            //echo $row1['status'];
                                                            if($status == "In Progres"){
                                                                $n ++;
                                                                $course_code = $row1['course_code'];
                                                                //echo $course_code;
                                                                $sql2 = "SELECT * FROM courselist WHERE course_code='$course_code'";
                                                                $result2 = $conn->query($sql2);
                                                                foreach($result2 as $row2){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $n ?></td>
                                                                        <td><?php echo $row1['course_code'] ?></td>
                                                                        <td><?php echo $row2['course_title']?></td>
                                                                        <td><?php echo $row2['credit']?></td>
                                                                        <td><?php echo $row1['type']?></td>
                                                                        <td><?php echo $row1['section']?></td>
                                                                        <td><?php echo $row1['reg_status']?></td>
                                                                        <td>
                                                                            <form action="edit_info.php" method="POST">
                                                                                <input type="hidden" name="update_id" id="update_id" value= <?php echo $row1['id']?>>
                                                                                <button type="submit" name="update" class="btn btn-primary" style='font-size:15px'><i class="fa fa-edit" ></i></button>
                                                                            </form>
                                                                        </td>
                                                                        <td>
                                                                            <form action="delete_reg_course.php" method="POST">
                                                                                <input type="hidden" name="delete_id" id="delete_id" value=<?php echo $row1['id']?>>
                                                                                <button type="submit" name="delete" id="delete"class="btn btn-danger" style='font-size:15px'><i class="fa fa-trash" ></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            
                           
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title col-md-6">Completed Courses</h4>
                                    <hr class="mb-3 ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Credit</th>
                                                    <th>SGPA</th>
                                                    <th>Semester</th>
                                                    <th>Type</th>    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $cs_id = $row['student_id'];
                                                    $sql1 = "SELECT id, student_id, course_code, type, section, semester, sgpa, status, reg_status FROM register_course WHERE student_id = '$cs_id' and status = 'Completed'";
                                                    $result1 = $conn->query($sql1);
                                                    $m = 0;
                                                    if($result1->num_rows>0){
                                                        while($row1 = $result1 -> fetch_assoc()){
                                                            $course_code = $row1['course_code'];
                                                            $sql2 = "SELECT * FROM courselist WHERE course_code='$course_code'";
                                                            $result2 = $conn->query($sql2);
                                                            
                                                            foreach($result2 as $row2){
                                                                $m ++;
                                                                
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $m ?></td>
                                                                    <td><?php echo $row1['course_code'] ?></td>
                                                                    <td><?php echo $row2['course_title']?></td>
                                                                    <td><?php echo $row2['credit']?></td>
                                                                    <td><?php echo $row1['sgpa']?></td>
                                                                    <td><?php echo $row1['semester']?></td>
                                                                    <td><?php echo $row1['type']?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            
                            <?php
                        }

                    }
                ?>
        </div>  
    </div>
<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
</body>
</html>

