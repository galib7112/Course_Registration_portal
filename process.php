
<?php 
    require("database_connection.php"); 
    session_start();
?>
<?php
    session_start();
    if(isset($_POST['add'])){
        $student_id       = $_POST['student_id'];
        $first_name       = $_POST['first_name'];
        $last_name        = $_POST['last_name'];
        $email            = $_POST['email'];
        $phone            = $_POST['phone'];
        $department       = $_POST['department'];
        $shift            = $_POST['shift'];
        $batch            = $_POST['batch'];
        $_SESSION['success'] = ""; 
        
        $sql = "INSERT INTO studentlist (student_id, first_name, last_name, email, phone, department, shift, batch) VALUES('$student_id','$first_name','$last_name','$email','$phone','$department','$shift','$batch')";
        $query_run = mysqli_query($db,$sql);
        if($conn->query($sql)){
            $_SESSION['new_student_reg_success'] = "Student Added";
            header("Location: new_student_registration.php");


        }else{
            $_SESSION['new_student_reg_failed'] = "Something Worong";
            header("Location: new_student_registration.php");
        }
    }else{
        $_SESSION['new_student_reg_faild'] = "No Data";
        header("Location: new_student_registration.php");
    }
?>