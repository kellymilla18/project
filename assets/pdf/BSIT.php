

<?php
require("fpdf/fpdf.php");
$pdf=new FPDF();
//var_dump((get_class_methods($pdf));
$pdf->AddPage();

$pdf->SetFont("Arial","","10");
 $pdf->SetFillColor(128,128,128);
    
    $pdf->SetDrawColor(92,92,92);
    $pdf->SetLineWidth(.3);


$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "root";
$mysql_database = "project";


$conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
 
//HEADER
$pdf->Cell(0,10,"ATENEO DE NAGA UNIVERSITY",7,1,"C");
$pdf->Cell(0,10,"Bachelor of Science in Information Technology",7,1,"C");

$pdf->Cell(0,10,"Curriculum SY 2007-2008",7,1,"C");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
 $pdf->Image('mylogo.png',8,5,30);
 $pdf->Cell(30,10,"First Year",7,1,"L");
 $pdf->Cell(30,8,"First Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '1' AND b.semester = '1st'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}

//1:2nd sem  


 $pdf->Cell(30,8,"Second Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '1' AND b.semester = '2nd'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}
//1:3

//1:2nd sem  


 $pdf->Cell(30,8,"Summer",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '1' AND b.semester = 'Sum'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}


$pdf->Ln();

//2:1

 $pdf->Cell(30,10,"Second Year",7,1,"L");
 $pdf->Cell(30,8,"First Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '2' AND b.semester = '1st'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}


//1:2nd sem  


 $pdf->Cell(30,8,"Second Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');

//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '2' AND b.semester = '2nd'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }             

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

 }

//1:3

//1:2nd sem  


 $pdf->Cell(30,8,"Summer",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '2' AND b.semester = 'Sum'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }             

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');
}


//3:1


$pdf->Ln();

//2:1

 $pdf->Cell(30,10,"Third Year",7,1,"L");
 $pdf->Cell(30,8,"First Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');

//QUERY
  //QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '3' AND b.semester = '1st'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}


//1:2nd sem  


 $pdf->Cell(30,8,"Second Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '3' AND b.semester = '2nd'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}

//1:3

//1:2nd sem  


 $pdf->Cell(30,8,"Summer",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '3' AND b.semester = 'Sum'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }             

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}


//4:1


$pdf->Ln();

//2:1

 $pdf->Cell(30,10,"Fourth Year",7,1,"L");
 $pdf->Cell(30,8,"First Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '4' AND b.semester = '1st'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA
$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');

}
//1:2nd sem  


 $pdf->Cell(30,8,"Second Semester",3,1,'L');

$pdf->Cell(40,6,"SUBJECT CODE",1,0,'L');
$pdf->Cell(80,6,"SUBJECT DESCRIPTION",1,0,'L');
$pdf->Cell(30,6,"UNIT",1,0,'L');
$pdf->Cell(40,6,"PREREQUISITE",1,1,'R');


//QUERY
  $sql_view = "SELECT a.course_name,b.subject_code,b.subject_desc,b.unit,b.prerequisite,b.semester,b.school_year from course a,subject b where a.course_id = b.course_id AND a.course_name = 'Bachelor of Science in Information Technology' AND b.school_year = '4' AND b.semester = '2nd'";
  $result = mysqli_query($conn,$sql_view);
   $num = mysqli_num_rows($result);

   if($num == 0){
     $pdf->Cell(30,8,"NO SUBJECTS AVAILABLE",3,1,'L');
    }
                 

//RETRIVE DATA
while($row = mysqli_fetch_array($result)){
 $subcode = $row['subject_code'];
 $subdesc = $row['subject_desc'];
 $subunit = $row['unit'];
 $prereq = $row['prerequisite'];
 $year= $row['school_year'];
                          

//DISPLAY DATA

$pdf->Cell(40,6,$subcode,1,0,'L');
$pdf->Cell(80,6,$subdesc,1,0,'L');
$pdf->Cell(30,6,$subunit,1,0,'L');
$pdf->Cell(40,6,$prereq,1,1,'R');


}





$pdf->Output();

//echo $user.$pass.$email;

?>

