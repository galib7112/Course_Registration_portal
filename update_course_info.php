
<?php 
    require("database_connection.php"); 
    session_start();
?>
<?php
    
    if(isset($_POST['update'])){
        $update_id  = $_POST['update_id'];
        $course_status = $_POST['course_status'];
        $reg_status = $_POST['reg_status'];
        $sgpa = $_POST['sgpa'];

        $sql = "UPDATE register_course SET status='$course_status', reg_status='$reg_status', sgpa='$sgpa' WHERE id='$update_id'";
        $sql1 = "SELECT student_id FROM register_course where id = '$update_id'";
        $result = $conn->query($sql1);
        $s_id = '';
        foreach($result as $row){
            $s_id = $row['student_id'];
        }
        if($conn->query($sql)){
            $_SESSION['update_course_success'] = $s_id;
            $_SESSION['update_course_success1'] = '';
            header("Location: student_details_info.php");
        }else{
           $_SESSION['update_course_failed'] = "";
           header("Location: index.php");
        }
    }
?>