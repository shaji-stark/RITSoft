<?php
include("includes/header.php");
include("includes/sidenav.php");
include("../connection.php");
?>
<script  src="jquery.js"></script>

<script type="text/javascript">
  function fetchsubject(a)
  { 
    console.log(a);
    $.post("getsub.php",{ key : a},
      function(data){
        $('#data').html(data);
      }); 
  }
</script>

<script>
  function validate()
  {
   var s1 = document.getElementById('classid').value;
   var s2 = document.getElementById('subjectid').value;
   if(s1=="--select--"){
    alert("Please select Semester");
    return false;
  }
  if(s2=="--select--"){
    alert("Please select Subject");
    return false;
  }

  return true;
} 
</script>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header" align="center"><span>Subject Allocation</span></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">

     <form id="suballoc" action = "suballoc.php" method = "POST" enctype = "">
       <table  id="outer1" align="center" style="padding-top:40px">
        <br><br>
        <tr>
         <td>
          <label>Semester:<span class="required">*</span></label>
        </td>
        <td><select onchange="fetchsubject(this.value)" name="classid" class="form-control">
         <option value="--select--">--select--</option>
         <?php

         $sql="select * from class_details where deptname in(select deptname from faculty_details where fid='$hodid' and active like '%YES%')";
         $r=mysql_query($sql,$con);
         while($result=mysql_fetch_array($r))   {
           echo "<option value='" . $result["classid"] ."'>".$result["courseid"]."-".$result["semid"]."-".$result["branch_or_specialisation"]."</option>";
         }
         ?>	
       </select></td>
     </tr>

     <tr>
      <td>
       <label>Subject :<span class="required">*</span></label>
     </td>
     <td>

      <div id ="data">
        <select name="subjectid" id="subjectid" class="form-control">
         <option value="--select--">--select--</option>

       </select>
     </div>
   </td>
 </tr>

 <tr>
   <td>
    <label>Faculty Name:<span class="required">*</span></label>
  </td>  
  <td>
   <div id ="data2">
    <input list="name" autocomplete="off" name="name" class="form-control" type="text" onChange="fillname(this.value)"/> 		
    <datalist id="name">
     <option value="--select--">--select--</option>
     <?php

     $l=mysql_query("select deptname from department where hod='$hodid'",$con) or die(mysql_error());
     $r=mysql_fetch_assoc($l);
     $dept=$r["deptname"];
     $sql="select * from faculty_details where name like '$name%' and fid not like 'DUMMY%' ";   $r=mysql_query($sql,$con);
     while($result=mysql_fetch_array($r)){     
      echo "<option value='".$result["name"]."''>".$result["name"]."-".$result["deptname"]."-".$result["phoneno"]."</option>";
    }
    ?>	
  </datalist></div></td> 
</tr>

<tr>
  <td>
    <label>Faculty ID:<span class="required"></span></label>
  </td><td>
    <div id ="data1">
      <input list="fid" disabled="disabled" autocomplete="off" class="form-control" name="fid" type="text" />
      <datalist id="fid">
        <option value="--select--">--select--</option>
        <?php
        $sql="select * from faculty_details where deptname='$dept' and fid not like 'DUMMY%'";
        $r=mysql_query($sql,$con);
        while($result=mysql_fetch_array($r)){
          echo '<option value="'.$result['fid'].'">'.$result['fid'].'</option>';
          echo  '<input  name="fid" type="hidden" value="'.$result['fid'].'"/>';
        }
        ?>	
      </datalist></div></td>
    </tr>
<tr>

  
  <td>
  <label>Type:*</label>  
  </td>
  <td>
    <label class="radio-inline">
    <input type="radio" value="main" required="required"  name="type">Main
    </label>
    <label class="radio-inline">
    <input type="radio" name="type" required="required" value="sub">Sub
    </label>
  </td>
</tr>
    <tr>
      <td></td>
      <td><input style="width:100px" id="submit" class="btn btn-primary" type="submit" value="submit" name="submit"/></td>           
    </tr>

  </table>
</form>

</div>
</div>
</div>


<script src="jquery.js"></script>
<script type="text/javascript">
  function fillname(x)
  {
    $.post("load.php", { key:x },
      function(data) {
        $('#data1').html(data);
      });
  }

</script>




<?php 
include("includes/footer.php");
?>
