<?php 
    require("database_connection.php"); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Student List</title>
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
                <h1 class="h3 mb-0 text-gray-800">Student List</h1>
            </div>
            <?php if (isset($_SESSION['delete'])) : ?> 
                <div class="alert alert-danger" role="alert" >
                    <?php echo $_SESSION['delete']." is removed from the student list."?>
                </div> 
            <?php  unset($_SESSION['delete']); endif ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                </div>
                <div class="card-body">  
                   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>View</th>
                                    <th>Delete</th>      
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT student_id, first_name, last_name, email, department, shift FROM studentlist";
                                    $result = $conn->query($sql);
                                    if($result->num_rows>0){
                                        while($row = $result -> fetch_assoc()){
                                            
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $row['student_id'] ?></td>
                                            <td><?php echo $row['first_name'] ?></td>
                                            <td><?php echo $row['last_name']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['department']?></td>
                                            <td><?php echo $row['shift']?></td>
                                            <td>
                                                <form action="student_details_info.php" method="POST">
                                                    <?php unset($_SESSION['success']);?>
                                                    <input type="hidden" name="view_id" value="<?php echo $row['student_id'] ?>">
                                                    <button type="submit" name="view" class="btn btn-primary" style='font-size:15px'><i class="fa fa-eye" ></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="delete.php" method="POST">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['student_id'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-danger" style='font-size:15px'><i class="fa fa-trash" ></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
                
    </div>
    <!-- End of Main Content -->
<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
</script>
</body>
</html>
