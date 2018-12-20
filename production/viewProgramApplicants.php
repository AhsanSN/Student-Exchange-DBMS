<?php

include_once("database.php");

if(isset($_GET['programId'])){
    $pId = $_GET['programId'];
}

$viewProg="select ab.memberFullName, ab.memberEmail,ab.program_programId, ab.registeredMembers_memberId, ab.appId,
case
	when iv.interviewId is null then 'Call'
	else iv.interviewResult
end as `Call for Interview`
from
(
select pa.*, rm.memberFullName, rm.memberEmail
from programApplicant pa inner join registeredMembers rm 
		on pa.registeredMembers_memberId = rm.memberId
where pa.program_programId = '$pId'
) ab
left outer join interview iv on ab.appId = iv.programApplicant_appId";
$result_viewProg = $con->query($viewProg);


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
                    <h2>View Program Applicants</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
             
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            
                            if ($result_viewProg->num_rows > 0) {
                                while($row= $result_viewProg->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['memberFullName']."</td>";
                                    echo "<td>".$row['memberEmail']."</td>"; 
                                    
                                    if ($row['Call for Interview']=='Call'){
                                        echo "<td><a href='insertInterview.php?programId=".$row['program_programId']."&studentId=".$row['registeredMembers_memberId']."&appId=".$row['appId']."'>".$row['Call for Interview']."</a></td>"; 
                                    }
                                    else{
                                        echo "<td>".$row['Call for Interview']."</td>";
                                    }
                                    
                                    echo "</tr>";
                                }
                            }

                          ?>
                          <!--
                          <tr>
                              <td>for trial</td>
                              <td>Ah@sad.com</td>
                              <td><a href='insertInterview.php?programId=12&studentId=2&appId=12'>Call</a></td>
                          </tr>
                          -->
    
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
