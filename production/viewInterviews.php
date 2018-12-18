<?php

include_once("database.php");

if(isset($_GET['action'])&&(isset($_GET['interviewId']))){
    $action = $_GET['action'];
    $interviewId = $_GET['interviewId'];
    
    if($action==1){
        $viewProga="UPDATE interview
        SET interviewResult = 'Selected'
        WHERE interviewId = '$interviewId'";
    $result_viewProg = $con->query($viewProga);
    }
    if($action==0){
        $viewProga="UPDATE interview
        SET interviewResult = 'Rejected'
        WHERE interviewId = '$interviewId'";
    $result_viewProg = $con->query($viewProga);
    }
    
    //
}

$viewProg="select rm.memberFullName, pr.programName, pr.programId, rm.memberId, org.orgName, iv.interviewDate, iv.interviewTime, iv.interviewId,
		em.employeeFullName, iv.interviewLocation
from interview iv inner join registeredMembers rm 
			on iv.programApplicant_registeredMembers_memberId = rm.memberId
		inner join program pr on iv.programApplicant_program_programId = pr.programId
		inner join organization org on pr.programId = org.orgId
		inner join employee em on iv.employee_employeeId = em.employeeId
where iv.interviewResult = 'Pending'";
$result_viewProg = $con->query($viewProg);



/**
UPDATE interview
        SET interviewResult = 'Rejected'
        WHERE programId = '$program_programId'**/


?>
<!DOCTYPE html>
<html lang="en">
  <?php include_once("./phpParts/head.php")?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include_once("./phpParts/leftMenu.php")?>

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Interviews</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Program Name</th>
                          <th>Organization</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Location</th>
                          <th>Interviewer</th>
                          <th>Take Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            if ($result_viewProg->num_rows > 0) {
                                while($row= $result_viewProg->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['memberFullName']."</td>";
                                    echo "<td>".$row['programName']."</td>"; 
                                    echo "<td>".$row['orgName']."</td>"; 
                                    echo "<td>".$row['interviewDate']."</td>"; 
                                    echo "<td>".$row['interviewTime']."</td>"; 
                                    echo "<td>".$row['interviewLocation']."</td>"; 
                                    echo "<td>".$row['employeeFullName']."</td>"; 
                                    echo "<td><a href='?interviewId=".$row['interviewId']."&action=1&appId=21'>Accept</a>/<a href='?interviewId=".$row['interviewId']."&action=0&appId=21'>Reject</a>
                                    </td>"; 
                                    echo "</tr>";
                                }
                            }

                          ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /footer content -->
      </div>
    </div>
    <?php include_once("./phpParts/endScripts.php")?>
           <!-- Datatables -->
               <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  </body>

</html>
