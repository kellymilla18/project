<html>
  <head>
    <link href="css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



 <link href="css/tab/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/tab/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/tab/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="css/tab/font-awesome.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .but-main{
      margin: 20px;
    }


    .addform{
        margin-top: 3%;
        background:#f1f1f1;
        width:500px;
        border: 4px;
        border-radius: 5%;
        padding:15px;
   }

   .addform select{
    margin-bottom: 10px;
    margin-right: 10px;
   }

   .addform input[type="text"]{
    margin-bottom: 10px;
   }
   .div-courses{
    margin-top: 20px;
    margin-left:40px;
   }

</style>
   
  </head>

  </body>

                     <!-- begin menus -->

                  <div class = "header">
                        
                 </div>

                  <!-- Form for adding begin -->
                                      <div class="but-main">
                    <button onclick="location.href = 'AddSubjects.php'" class="btn btn-lg btn-primary">Add</button>
                    <button  onclick="location.href = 'EditSubjectsIT.php'"class="btn btn-lg btn-primary">Edit</button>
                    <button  onclick="location.href = 'DeleteSubjectsIT.php'"class="btn btn-lg btn-primary">Delete</button>
                    <button onclick="location.href = 'ViewSubjectsCS.php'" class="btn btn-lg btn-primary">View</button>

                    </div>
                    </center>
                                      
                     <center>
                    <div class = "div-addform">
                    <form class="addform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                     <center>
                     <div class="div-courses">
                   <label> Select Program of Study
                        <select class="courses" name="courses">
                          <option value="<?php echo $_POST['courses'];?>" selected ><?php echo $_POST['courses'];?></option>
                          <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                          <option value="Bachelor of Science in Information System">Bachelor of Science in Information System</option>
                          <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                        </select>
                  </label>
                  </div>
                    </center>
                       


                       <label>Year
                       <select name="year">
                         <option value="<?php echo $_POST['year'];?>" selected><?php echo $_POST['year'];?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                       </select>
                       </label>


                        <label>Semester
                       <select name="sem">
                         <option value="<?php echo $_POST['sem'];?>" selected><?php echo $_POST['sem'];?></option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="Sum">Sum</option>
                       </select>
                       </label>
                      
             

                       <center>
                       <input type="text" name="subjectcode" value="<?php echo $_POST['subjectcode'];?>"><br>
                       <input type="text" name="subjectdesc" value="<?php echo $_POST['subjectdesc'];?>"><br>
                       <input type="text" name="unit" value="<?php echo $_POST['unit'];?>"<br>
                       <input type="text" name="preq" id="preq" value="<?php echo $_POST['preq'];?>"><br>
                       <input type='hidden' name='subject_id' value="<?php echo $_POST['subject_id'];?>">
                        <input type='hidden' name='course_id' value="<?php echo $_POST['subject_id'];?>">
               
                
                   <button type="Reset" class="btn btn-primary">Reset</button>
                  <button type="Submit" class="btn btn-primary" >Save</button>

                </form>
              </div>
            </center>
             <!-- end form adding -->
           
               <?php

              include 'connection.php';
              

                if($_POST){

                  
                       echo $course =$_POST['courses'];
                       echo $year = $_POST['year'];
                       echo $sem = $_POST['sem'];
                      echo  $sub_code = $_POST['subjectcode'];
                       echo $sub_desc = $_POST['subjectdesc'];
                       echo $sub_unit = $_POST['unit'];
                       echo $sub_preq =$_POST['preq'];

                      echo $req_courseid =$_POST['course_id'];
                      echo $req_subjid=$_POST['subject_id'];

                         $sql_update = "UPDATE course SET course_name = '$course' WHERE course_id = '$req_courseid'";
                       $inserted = mysqli_query($conn, $sql_update);
                      

                       $sql_update2 = "UPDATE subject SET course_id = '$req_courseid',subject_code = '$sub_code',subject_desc = '$sub_desc' ,unit='$sub_unit',prerequisite = '$sub_preq',school_year = '$year',semester = '$sem' WHERE subject_id='$req_subjid'";
                       $inserted2 = mysqli_query($conn, $sql_update2);
                      

                }

             ?>
              

  </body>
</htmlR_