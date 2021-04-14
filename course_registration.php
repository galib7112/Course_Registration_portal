<?php 
    require("database_connection.php");
    require("count.php"); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4 form-group col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Course Registration</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title col-md-12">Search Student Information</h4>
                    <hr class="mb-3 ">
                    <form class="form-inline"  id="e_info"method="POST" action="course_registration.php">
                        <div class="col-auto">
                            <label class="sr-only" >Student Id</label>
                            <input type="text" class="form-control mb-2 mr-sm-2"name="student_id" id="stduent_id" placeholder="Enter Student Id"required>
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" >Semester</label>
                            <select id="semester" name="semester" class="form-control mb-2 mr-sm-2" required>
                                <option selected><?php echo $current_semester ?></option>
                                <option >Spring 21</option>
                                <option >Fall 20</option>
                                <option>Summer 20</option>
                                <option>Spring 20</option>
                                <option>Fall 19</option>
                                <option>Summer 19</option>
                                <option>Spring 19</option>
                                <option>Fall 18</option>
                                <option>Summer 18</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>
                    </form>
                    <?php
                        
                        if(isset($_POST['search'])){
                           
                            $student_id = $_POST['student_id'];
                            $semester = $_POST['semester'];
                            $sql = "SELECT student_id, first_name, last_name, email, department, shift FROM studentlist";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                $flag =0;
                                while($row = $result -> fetch_assoc()){
                                        
                                    if($student_id == $row['student_id']){
                                        $flag =1;
                                        ?>
                                        <form action="course_registration.php" method="POST" id ="info">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >First Name</label>
                                                    <input type="text" class="form-control"  value="<?php echo $row['first_name'] ?>"disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['last_name']?>"disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Student Id</label>
                                                    <input type="text" class="form-control" id="st_id" value="<?php echo $row['student_id']?>"disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Semster</label>
                                                    <input type="text" class="form-control" id="s_semester"name="s_semester"value= "<?php echo $semester?>"disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label >Registration Status</label>
                                                    <select id="status" name="status" class="form-control " required>
                                                        <option selected>Completed</option>
                                                        <option>Panding</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </form>
                                        <?php
                                        break;
                                    }
                                }
                                if($flag == 0){
                                    ?>
                                    <div class="align-self-center mx-auto"><?php echo "No data available"?></div>
                                    <?php
                                }
                            } 
                            
                        }
                    ?> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title col-md-12">Enter Course Information</h4>
                    <hr class="mb-3 ">
                    <form method="POST" action="course_registration.php">
                       <div class="form-group">
                            <label for="exampleFormControlSelect2">Select courses</label>
                            <select multiple class="form-control" id="course" name="course[]" size=6 onchange="log()">
                                <?php
                                    $n = 0;
                                    $sql = "SELECT course_code, course_title FROM courselist";
                                    $result = $conn->query($sql);
                                    if($result->num_rows>0){
                                        $x = 1;
                                        while($info = $result -> fetch_assoc()){
                                            
                                            ?>
                                            <option value = "<?php echo $x.'-'.$info['course_code'].'-'.$info['course_title']?>"><?php echo $x.". ".$info['course_code']."   ".$info['course_title'] ?></option>
                                            <?php
                                            $x++;
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </div>
 
                    </form>
                </div>
            </div>
 
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title col-md-12">Selected Course</h4>
                    <hr class="mb-3 ">
                    <form method="POST" action="course_registration.php" id="selected_course" class="container">
 
 
 
 
                    </form>
                    <div class="d-flex h-100">
                        <div class="align-self-center mx-auto">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary "  >Submit</button>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
        	let courses = [];
        	let scourses = [];
        	function log(){
        		let list_body = '';
        		let element = document.getElementById('course').value;
        		element = element.split('-');
        		courses.push({
        			'id' : element[0],
        			'code' : element[1],
        			'title' : element[2]
        		});
        		for(let i = 0; i < courses.length; i++){
                    var a = String(courses[i].id)+ "section";
                    var sec = a.replace(" ","_");
                    var b = String(courses[i].id)+ "status";
                    var st = b.replace(" ","_");
        			list_body += 	"<div class='row'>"+
					        			"<div class='form-group col-md-6'>"+
						        			"<label>Course Code</label>"+
						        			"<input type='hidden' class='form-control courses'  value='"+courses[i].id+'-'+courses[i].code+'-'+courses[i].title+"''>"+
						        			"<input type='text' class='form-control'  value='"+courses[i].code+'-'+courses[i].title+"''>"+
						        		"</div>"+
						                "<div class='form-group col-md-3'><label >Section</label>"+
						                	"<select class='form-control' id='"+sec+"'required>"+
							                    "<option value=''>Choose Section</option>"+
							                    "<option value='A'>A</option>"+
							                    "<option value='B'>B</option>"+
							                    "<option value='C'>C</option>"+
							                    "<option value='D'>D</option>"+
                                                "<option value='E'>E</option>"+
							                    "<option value='F'>F</option>"+
							                    "<option value='G'>G</option>"+
							                    "<option value='H'>H</option>"+
						                    "</select>"+
					                    "</div>"+
                                        "<div class='form-group col-md-3'><label >Type</label>"+
						                	"<select class='form-control' id='"+st+"'required>"+
							                    "<option value=''>Choose Course Type</option>"+
							                    "<option value='Regular'>Regular</option>"+
							                    "<option value='Retake'>Retake</option>"+
						                    "</select>"+
					                    "</div>"+
				                    "</div>";
 
        		}
                // list_body +="<button type='submit' id ='submit'class='btn btn-primary'>Submit</button>"
        		document.getElementById("selected_course").innerHTML = list_body;
        	}
            $(document).ready(function() {
            	let final_courses = [];
                
                $('#submit').on('click', function(e) {
                	let courses = document.getElementsByClassName('courses');
                	for(let i = 0; i< courses.length; i++){
                        
                		element = courses[i].value;
                		element = element.split('-');
                        var a = String(element[0]) + "section";
                        var sec = a.replace(" ","_");
                        var b = String(element[0])+ "status";
                        var st = b.replace(" ","_");
                		let section = document.getElementById(sec).value;
                        let type = document.getElementById(st).value;
                		final_courses.push({
                			'course_id'     : element[0],
                			'section'       : section,
                            'type'          : type,
                			'course_code'   : element[1],
                			'course_name'   : element[2] 
                		});
                		
                		
                	}
                	
                    $("#submit").attr("disabled", "disabled");
                    for(let i=0;i<final_courses.length;i++){
                        
                        var st_id  = $('#st_id').val();
                        var semester    = $('#s_semester').val();
                        var course_code = final_courses[i].course_code;
                        var section     = final_courses[i].section;
                        var type        = final_courses[i].type;
                        var status      = $('#status').val();

                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'process3.php',
                            data: ({st_id: st_id, semester: semester, course_code: course_code, section: section, type: type, status: status}),
                            // console.log(data)
                            success: function(data){
                                
                                Swal.fire({
                                    'title': 'Successful',
                                    'text': 'Successfully Regestered',
                                    'icon': 'success'
                                    
                                }).then(function() {
                                    window.location = "course_registration.php";
                                });
                            },
                            error: function(data){
                                
                                Swal.fire({
                                    'title': 'Errors',
                                    'text': 'Something went worng!!!',
                                    'icon': 'error'
                        
                                })
                            }
                        });

                    }
                    
                });
            });
        </script>
 
 
    </div>
    <!-- End of Main Content -->
<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
</body>
</html>
