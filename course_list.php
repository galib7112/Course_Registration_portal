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
                <h1 class="h3 mb-0 text-gray-800">Course List</h1>
            </div>
            <?php if (isset($_SESSION['course_delete_success'])) : ?> 
                <div class="alert alert-danger" role="alert" >
                    <?php echo $_SESSION['course_delete_success']." is removed from the student list."?>
                </div> 
            <?php  unset($_SESSION['course_delete_success']); endif ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Course List</h6>
                </div>
                <div class="card-body">  
                   
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit</th>
                                    <th>Level</th>
                                    <th>Term</th>
                                    <th>Delete</th>      
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT course_code, course_title, credit, level, term FROM courselist";
                                    $result = $conn->query($sql);
                                    $count = 0;
                                    if($result->num_rows>0){
                                        while($row = $result -> fetch_assoc()){
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $row['course_code'] ?></td>
                                            <td><?php echo $row['course_title'] ?></td>
                                            <td><?php echo $row['credit']?></td>
                                            <td><?php echo $row['level']?></td>
                                            <td><?php echo $row['term']?></td>
                                            
                                            <td>
                                                <form action="course_delete.php" method="POST">
                                                    
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['course_code'] ?>">
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
