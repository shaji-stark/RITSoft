<?php 
	include("../connection.php");
?>
<?php
if (isset($_POST["classid"]) && isset($_POST["status"])) {
	
	$classid=$_POST["classid"];
	$status=$_POST["status"];
	
	$l=mysql_query("select acd_year from academic_year where status=1") or die(mysql_error());
				$r=mysql_fetch_assoc($l);
				$acd_year=$r["acd_year"];
				$cur=explode('-',$acd_year);
				
				$y1= $cur[0]-1;
				$y2= $cur[1]-1;

				$acd_year=$y1."-".$y2;

//1. moving current class details to current_class_semreg

				mysql_query("insert into current_class_semreg(classid,studid,rollno,adm_status) select classid,studid,rollno,adm_status from current_class where classid='$classid'") or die(mysql_error());
				
//1. archiving sessional marks		
           mysql_query("insert into sessional_marksold(classid,studid,subjectid,sessional_marks,sessional_remark,verification_status,sessional_date,acd_year) select classid,studid,subjectid,sessional_marks,sessional_remark,verification_status,sessional_date,'$acd_year' from sessional_marks where classid='$classid'") or die(mysql_error());
	
//2. archiving series exam marks
             mysql_query("insert into each_sessional_marksold(series_no,classid,studid,subjectid,sessional_marks,sessional_remark,status,sessional_date,acd_year) select series_no,classid,studid,subjectid,sessional_marks,sessional_remark,status,sessional_date,'$acd_year' from each_sessional_marks where classid='$classid'") or die(mysql_error());

				
//3. archiving attendance
   mysql_query("insert into attendanceold(attid,date,hour,subjectid,classid,studid,status,acd_year) select attid,date,hour,subjectid,classid,studid,status,'$acd_year' from attendance where classid='$classid'") or die(mysql_error());
				
//4. archiving elective
  mysql_query("insert into elective_studentold(sub_code,stud_id,acd_year,classid) select sub_code,stud_id,'$acd_year','$classid' from elective_student where stud_id in (select studid from current_class where classid='$classid')") or die(mysql_error());
				
				
//5. archiving lab student details
  mysql_query("insert into lab_batch_studentold(studid,batch_id,acd_year,classid) select studid,batch_id,'$acd_year','$classid' from lab_batch_student where studid in (select studid from current_class where classid='$classid')") or die(mysql_error());

//6. archiving duty leave

  mysql_query("insert into duty_leaveold(id,studid,subjectid,leave_date,hour,remark,date,acd_year,classid) select id,studid,subjectid,leave_date,hour,remark,date,'$acd_year','$classid' from duty_leave where studid in (select studid from current_class where classid='$classid')") or die(mysql_error());
				
				

//***deleteing details from main table		
						
mysql_query("delete from attendance where classid='$classid'") or die(mysql_error());
mysql_query("delete from sessional_marks where classid='$classid'") or die(mysql_error());
mysql_query("delete from each_sessional_marks where classid='$classid'") or die(mysql_error());
mysql_query("delete from elective_student where stud_id in (select studid from current_class where classid='$classid')") or die(mysql_error());
mysql_query("delete from lab_batch_student where studid in (select studid from current_class where classid='$classid')") or die(mysql_error());
mysql_query("delete from duty_leave where studid in (select studid from current_class where classid='$classid')") or die(mysql_error());
//***  


//fetching classid of next semester based on current semester
$z=mysql_query("select * from semregstatus where curr_sem='$classid'") or die(mysql_error());
$r=mysql_fetch_assoc($z);
$next_sem=$r["next_sem"];

//current semester becomes inactive, next semester active.....
		
	mysql_query("update class_details set active='NO' where classid='$classid'") or die(mysql_error());
	mysql_query("update class_details set active='YES' where classid='$next_sem'") or die(mysql_error());
	
//update classid and admission status of students 
mysql_query("update current_class set classid='$next_sem',adm_status='PROVISIONALLY APPROVED' where classid='$classid'") or die(mysql_error());

//update classid of staff advisor

mysql_query("update staff_advisor set classid='$next_sem' where classid='$classid'") or die(mysql_error());

//updating status of semester registeration. enable link for students...
	
	mysql_query("update semregstatus set status='$status' where curr_sem='$classid'") or die(mysql_error());
	if($status==1)
	echo "Semester registration started";
	else
	echo "semester registration completed";
}
?>
