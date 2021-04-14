
<?php 
    require("database_connection.php"); 
    session_start();
?>
<?php
    
    if(isset($_POST['update'])){
        $student_id  = $_POST['update_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $shift = $_POST['shift'];
        $batch = $_POST['batch'];

        

        $sql = "UPDATE studentlist SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', shift='$shift', batch='$batch' WHERE student_id='$student_id'";

        
        if($conn->query($sql)){
            
            $_SESSION['update_student_info_success'] = $student_id;
            $_SESSION['update_student_info_success2'] = "";
            header("Location: student_details_info.php");
        }else{
           $_SESSION['update_student_info_failed'] = "";
           header("Location: index.php");
        }
    }
?>