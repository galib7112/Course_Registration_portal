
<?php 
    require("database_connection.php"); 
    session_start();
?>
<?php
    
    if(isset($_POST['delete'])){
        $delete_id  = $_POST['delete_id'];
        
        
        $sql = "DELETE FROM studentlist WHERE student_id = '$delete_id'";        
        $sql1 = "DELETE FROM register_course WHERE student_id = '$delete_id'";
        if($conn->query($sql1)){
            
            if($conn->query($sql)){

            }
            $_SESSION['delete'] = $delete_id;
            header("Location: student_list.php");

        }else{
            $_SESSION['delete_failed'] = "Student is not Deleted";
            header("Location: student_list.php");
        }
    }else{
        $_SESSION['delete_failed'] = "No Data";
        header("Location: student_list.php");
    }
?>