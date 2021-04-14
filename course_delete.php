<?php 
    session_start();
    require("database_connection.php");   
?>
<?php
    
    if(isset($_POST['delete'])){
        $course_code  = $_POST['delete_id'];
        
        $sql = "DELETE FROM courselist WHERE course_code = '$course_code'";        
        
        if($conn->query($sql)){

            $_SESSION['course_delete_success'] = $course_code;
            header("Location: course_list.php");

        }else{
            $_SESSION['course_delete_failed'] = "Student is not Deleted";
            header("Location: course_list.php");
        }
    }else{
        $_SESSION['course_delete_failed'] = "No Data";
        header("Location: course_list.php");
    }
?>