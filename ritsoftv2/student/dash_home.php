<?php
include("includes/header.php");
include("includes/sidenav.php");
//$fid=$_SESSION["fid"]; //faculty id from session



//READING FACULTY NAME AND DEPARTMENT
//$resul=mysql_query("select name,deptname from faculty_details where fid='KTU01'");
//while($dat=mysql_fetch_array($resul))
//{
  //  $fname=$dat["name"];
    //$fdeptname=$dat["deptname"];

//}


//reading class id from staff adviser
//$resul=mysql_query("select classid from staff_advisor where fid='KTU01'");
///while($dat=mysql_fetch_array($resul))
//{
   // $classid=$dat["classid"];
//}
//$_SESSION["classid"]=$classid;
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><span style="font-weight:bold;">WELCOME
                <?php
                $image_status = "";
                $r=mysql_query("select name, image_status from stud_details where admissionno='$admissionno'");
                while($d=mysql_fetch_array($r))
                {
                    $sname=$d["name"];
                    $image_status = $d["image_status"];

                }

                echo $sname;
                ?>       



            </span></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-table fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                          //              $ree=mysql_query("select reg_id,adm_no,classid,previous_sem,new_sem,apv_status from stud_sem_registration where classid='$classid' and apv_status='Not Approved'");
                            //            $r1=mysql_num_rows($ree);
                              //           echo $r1;
                                ?>    
                            </div>
                            <div>Semester Registration</div>
                        </div>
                    </div>
                </div>
                <a href="semregpost.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-3 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-edit fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            </div>
                            <div>University Mark</div>
                        </div>
                    </div>
                </div>
               <!-- <a href="mark.php"> -->
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart-o fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">


                            </div>
                            <div>Sessional Mark View</div>
                        </div>
                    </div>
                </div>
                <a href="sessionmark.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-8">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart-o fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                     //   $resul=mysql_query("select studid,rollno from current_class where classid='$classid' order by(rollno)");
                                        //$re=mysql_num_rows($resul);
                                         //echo $re;
                                ?> 

                            </div>
                            <div>Attendance View</div>
                        </div>
                    </div>
                </div>
                <a href="parent_monthly.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        

        <div class="col-lg-3 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-edit fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            </div>
                            <div>Feedback</div>
                        </div>
                    </div>
                </div>
                <a href="feedback.php">
                    <div class="panel-footer">
                        <span class="pull-left">Faculty Evaluation system</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-image fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            </div>
                            <div>Photo</div>
                        </div>
                    </div>
                </div>
                <a href="empreg.php">
                    <div class="panel-footer">
                        <span class="pull-left">Upload Student Photo</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

		
		
		
		<div class="col-lg-3 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-edit fa-fw fa-2x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            </div>
                            <div>BUG REPORTING</div>
                        </div>
                    </div>
                </div>
               <!-- <a href="newdash.php"> -->

                    <div class="panel-footer">
                        <span class="pull-left">report</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		
		
		
		
		
		
		
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">



                <?php    echo statusShow( $image_status,  $image_status) ;?>
            </div> 
        </div>
        <!-- /.panel -->

        <!-- /.panel-body -->

        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
</div>


<?php


function statusShow($variable, $status ) {

    $statusa = "success";
    $altertTest = "";

    switch (trim($variable)) {
        case 'Rejected': 
        $statusa = "danger";
        break;
        case 'Not Verified': 
        $statusa = "warning";
        break;
        case 'Verified': 
        $statusa = "success";
        return $altertTest ;
        break;
        
        default:
            # code...
        break;
    }

    $altertTest = $altertTest . '<div class="alert alert-' . $statusa . '">';
    $altertTest = $altertTest . '         <div class="panel-body">';
    $altertTest = $altertTest . '            <div class="col-md-2 text-right">';
    $altertTest = $altertTest . '';
    $altertTest = $altertTest . '                <strong>Image Status :</strong> ';
    $altertTest = $altertTest . '            </div>';
    $altertTest = $altertTest . '           <div class="col-md-8">';
    $altertTest = $altertTest . '';
    $altertTest = $altertTest . '              <p> ' .  $status . ' </p>';
    $altertTest = $altertTest . '          </div>';


    $altertTest = $altertTest . '           <div class="col-md-2">';
    $altertTest = $altertTest . '';
    $altertTest = $altertTest . '      <a href="details.php" class="btn btn-' . $statusa . '">VIEW PROFILE</a>         ';
    $altertTest = $altertTest . '          </div>';


    $altertTest = $altertTest . '      </div>';
    $altertTest = $altertTest . '  </div>';

    return $altertTest ;
}
?>



<?php

include("includes/footer.php");
?>
