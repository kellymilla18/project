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
    .but2-main{
      margin: 15px;
      float:right;
    }
</style>
   
  </head>
  </body>
  <div class = "header">


           

  </div>
                    <div class="but2-main">
                    <button onclick="location.href = 'DeleteSubjectsCS.php'" class="btn btn-lg btn-primary">CS</button>
                    <button  onclick="location.href = 'DeleteSubjectsIT.php'"class="btn btn-lg btn-primary">IT</button>
                    <button  onclick="location.href = 'DeleteSubjectsIS.php'"class="btn btn-lg btn-primary">IS</button>
  
                    </div>

                    <div class="but-main">
                    <button onclick="location.href = 'AddSubjects.php'" class="btn btn-lg btn-primary">Add</button>
                    <button  class="btn btn-lg btn-primary">Edit</button>
                    <button  onclick="location.href = 'DeleteSubjectsCS.php'" class="btn btn-lg btn-primary">Delete</button>
                    <button onclick="location.href = 'ViewSubjectsCS.php'" class="btn btn-lg btn-primary">View</button>

                    </div>
                    </center>
                                      
 


   <div class="container">                         
  <table class="table table-hover">
    <thead>
      <tr>
         <th>Subject Id</th>
        <th>Subject Code</th>
        <th>Subject Description</th>
          <th>Unit</th>
        <th>Prerequisite</th>
         <th>Semester</th>
          <th>Year</th>
           <th>Course</th>
        
      </tr>
    </thead> 

<?php

  include 'connection.php';

 $sql_view = "SELECT a.course_id,a.course_name,b.subject_id,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology'";
  $result = mysqli_query($conn,$sql_view);
  $num = mysqli_num_rows($result);
  
  
    while($row = mysqli_fetch_assoc($result)){
            $course_id = $row['course_id'];
            $subject_id = $row['subject_id'];
            $subcode = $row['subject_code'];
            $subdesc = $row['subject_desc'];
            $subunit = $row['unit'];
            $prereq = $row['prerequisite'];
            $year = $row['school_year'];
            $sem = $row['semester'];
               $course = $row['course_name'];


           //<td  align=center><a href=\"DeleteSubjectsIT2.php?subject_id=$subject_id & course_id=$course_id & subject_code=$subcode & subject_desc=$subdesc & unit=$subunit & prerequisite=$prereq &  school_year=$year & semester=$sem\">$subject_id</a></h7></td>            
                
      echo "<tr onmouseover=thiS.style.backgroundColor=\"D3D3D3\"; onmouseout=this.style.backgroundColor=\"\">
      <td  align=center><form method='post' action='EditSubjectsIT2.php'>
      <input type='hidden' name='subject_id' value='$subject_id'>
      <input type='hidden' name='course_id' value='$course_id'>
      <input type='hidden' name='subjectcode' value='$subcode'>
      <input type='hidden' name='subjectdesc' value='$subdesc'>
      <input type='hidden' name='unit' value='$subunit'>
      <input type='hidden' name='year' value='$year'>
      <input type='hidden' name='preq' value='$prereq'>
        <input type='hidden' name='sem' value='$sem'>
      <input type='hidden' name='courses' value='$course'>
  
      <button onclick='location.href = 'EditSubjectsIT2.php'' class='btn btn-lg btn-primary'>$subject_id</button></form>
      </td>
  
      <td align=center><h7>$subcode</h7></td>
      <td><h7>$subdesc</h7></td>
      <td><h7>$subunit</h7></td>
      <td><h7> $prereq </h7></td>
      <td><h7>$year</h7></td>
      <td><h7>$sem</h7></td>
        <td><h7>$course</h7></td>



      </tr>"; 


          
          
        
    }

  
  
        
?>
        
  </table>
</div>
  

  </body>
</html>