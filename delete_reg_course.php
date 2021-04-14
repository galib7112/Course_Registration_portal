
<?php 
    require("database_connection.php"); 
    session_start();
?>
<?php
    
    if(isset($_POST['delete'])){
        $delete_id  = $_POST['delete_id'];
        $sql = "DELETE FROM register_course WHERE id = '$delete_id'";        
        $sql1 = "SELECT student_id FROM register_course where id = '$delete_id'";
        $result = $conn->query($sql1);
        $s_id = '';
        foreach($result as $row){
            $s_id = $row['student_id'];
        }
        if($conn->query($sql)){
            $_SESSION['delete_reg_course_success'] = $s_id;
            $_SESSION['delete_reg_course_success1'] = '';
            header("Location: student_details_info.php");
        }else{
           $_SESSION['delete_reg_course_failed'] = "";
           header("Location: index.php");
        }
    }
?>