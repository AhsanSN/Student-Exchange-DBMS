<?php

include_once("global.php");

if ($logged == 0){
    ?>
    <script type="text/javascript">
    window.location = "login.php";</script>
    <?php
}
if(isset($_GET['applyForProgram'])){
    $programId = $_GET['applyForProgram'];
    
    $sqli="INSERT INTO programApplicant (registeredMembers_memberId, program_programId) VALUES ('$session_memberId', '$programId')";
        if(!mysqli_query($con,$sqli))
        {
        echo"Error adding entry.";
        }
        else{
            echo"Application submitted for prorgram successfully.";
            ?>
    <script type="text/javascript">
    window.location = "home.php";</script>
    <?php
        }
}

function runMyFunction() {
    echo 'Logging out...';
    session_destroy();
  }

  if (isset($_GET['logout'])) {
    runMyFunction();
    $logged=0;
    ?>
    <script type="text/javascript">
    window.location = "login.php";</script>
    <?php
  }

$viewProg="select pr.programId, pr.programName, org.orgName,
		case
		when pr.programType = 0 then 'Unpaid'
		when pr.programType = 1 then 'Paid'
		end
		as 'Program Type',
		pr.programStartDate, pr.programEndDate, pr.programLocation, 
		pr.programCountry, pr.programCity, pr.programDescription, pr.programRequirements,
		'Apply' as 'Apply for Program'
from program pr inner join organization org on pr.organization_orgId = org.orgId
where pr.programId not in (select program_programId
from programApplicant
where registeredMembers_memberId = 2
)
union
select pr.programId, pr.programName, org.orgName,
		case
		when pr.programType = 0 then 'Unpaid'
		when pr.programType = 1 then 'Paid'
		end
		as 'Program Type',
		pr.programStartDate, pr.programEndDate, pr.programLocation, 
		pr.programCountry, pr.programCity, pr.programDescription, pr.programRequirements,
		case
			when iv.interviewId is null then 'Applied - Wait for Interview Call'
			else iv.interviewResult
		end as 'Apply for Program'
from program pr 
		inner join organization org on pr.organization_orgId = org.orgId
		inner join programApplicant pa on pr.programId = pa.program_programId
		left outer join interview iv on pa.appId = iv.programApplicant_appId
where pa.registeredMembers_memberId = '$session_memberId'";
$result_viewProg = $con->query($viewProg);


$paisa="select ma.totalBalance from registeredMembers rm inner join memberAccount ma on rm.memberId = ma.registeredMembers_memberId where rm.memberId ='$session_memberId'";
$result_viewpaisa = $con->query($paisa);

?>
<!DOCTYPE html>
<html lang="en">
  <?php include_once("./phpParts/head.php")?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
                <a href="?logout=1">Logout</a>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Programs</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Organization</th>
                          <th>Type</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Location</th>
                          <th>Country</th>
                          <th>City</th>
                          <th>Description</th>
                          <th>Requirement</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            
                            if ($result_viewProg->num_rows > 0) {
                                while($row= $result_viewProg->fetch_assoc())
                                {
                                    
                                    echo "<tr>";
                                    echo "<td>".$row['programName']."</td>";
                                    echo "<td>".$row['orgName']."</td>"; 
                                    echo "<td>".$row['Program Type']."</td>"; 
                                    echo "<td>".$row['programStartDate']."</td>"; 
                                    echo "<td>".$row['programEndDate']."</td>"; 
                                    echo "<td>".$row['programLocation']."</td>";
                                    echo "<td>".$row['programCountry']."</td>"; 
                                    echo "<td>".$row['programCity']."</td>"; 
                                    echo "<td>".$row['programDescription']."</td>"; 
                                    echo "<td>".$row['programRequirements']."</td>"; 
                                    if ($row['Apply for Program']=='Apply'){
                                        echo "<td><a href='home.php?applyForProgram=".$row['programId']."'>[".$row['Apply for Program']."]</a></td>";
                                    }
                                    else{
                                        echo "<td>".$row['Apply for Program']."</td>";
                                    }
                                    
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
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Credit</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <h4>Account Balance: Rs. 
                      <?php
                      if ($result_viewpaisa->num_rows > 0) {
                                while($row= $result_viewpaisa->fetch_assoc())
                                {
                                    echo $row['totalBalance'];
                                }}
                      ?>
                      </h4>

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