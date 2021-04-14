
<?php 
    require("database_connection.php");
     session_start();
?>
<?php
    if(isset($_POST['add'])){
        $course_code       = $_POST['course_code'];
        $course_title      = $_POST['course_title'];
        $credit            = $_POST['credit'];
        $level             = $_POST['level'];
        $term              = $_POST['term'];
        
        
        $sql = "INSERT INTO courselist (course_code, course_title, credit, level, term) VALUES('$course_code','$course_title','$credit','$level','$term')";
        $query_run = mysqli_query($db,$sql);
        if($conn->query($sql)){
            $_SESSION['add_new_course_success'] = "Course Addes";
            header("Location: add_new_course.php");

        }else{
            $_SESSION['add_new_course_failed'] = "Something Worong";
            header("Location: add_new_course.php");
        }
    }else{
        $_SESSION['add_new_course_failed'] = "No Data";
        header("Location: add_new_course.php");
    }
?>