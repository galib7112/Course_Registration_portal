<?php
	require("database_connection.php"); 
	if(isset($_POST)){
        $student_id  = $_POST['st_id'];
        $course_code = $_POST['course_code'];
        $semester    = $_POST['semester'];
        $section     = $_POST['section'];
		$type        = $_POST['type'];
		$reg_status	 = $_POST['status'];
        $status      = "In Progress";
        
		
        $sql = "INSERT INTO register_course(student_id, course_code, type, section, semester, reg_status, status) VALUES ('$student_id','$course_code', ' $type', '$section', '$semester ', '$reg_status','$status')";
        

        if($conn->query($sql)){
			header("Location: index.php");
        }else{
           header("Location: index.php");
        }
    }else{
        
    }
?>
 