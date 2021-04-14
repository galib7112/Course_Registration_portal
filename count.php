<?php 
    require("database_connection.php");    
?>
<?php 
    $total_stduent = 0;
    $registar_student = 0;
    $current_semester = "";
    $date = date('d/m/Y');
    $date = explode('/',$date);
    if($date[1]>=1 and $date[1]<=4){
        $current_semester = "Spring";
    }
    else if($date[1]>=5 and $date[1]<=8){
        $current_semester = "Summer";
    }
    else{
        $current_semester = "Fall";
    }
    $year = $date[2]%100;
    $current_semester = $current_semester." ".$year;
    $sql = "SELECT student_id FROM studentlist";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $total_stduent = $result->num_rows;
        while($row = $result -> fetch_assoc()){
            $s_id = $row['student_id'];
            $sql1 = "SELECT * FROM register_course where student_id = '$s_id' and semester = '$current_semester'";
            $result1 = $conn->query($sql1);
            $num = $result1->num_rows;
            if($num>0){
               $registar_student++; 
            }
        }
    }
   
?>