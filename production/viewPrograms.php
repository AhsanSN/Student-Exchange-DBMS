<?php

include_once("database.php");

$viewProg="CALL AdminViewsPrograms()";
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
                    <h2>View Programs</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Organization</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Location</th>
                          <th>Country</th>
                          <th>City</th>
                          <th>Description</th>
                          <th>Requirement</th>
                          <th>Program Head</th>
                          <th>Capacity</th>
                          <th>Type</th>
                          <th>Number of Application</th>
                          <th>Selected Students</th>
                          <th>Mark as ended</th>
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
                                    echo "<td>".$row['programStartDate']."</td>"; 
                                    echo "<td>".$row['programEndDate']."</td>"; 
                                    echo "<td>".$row['programLocation']."</td>";
                                    echo "<td>".$row['programCountry']."</td>"; 
                                    echo "<td>".$row['programCity']."</td>"; 
                                    echo "<td>".$row['programDescription']."</td>"; 
                                    echo "<td>".$row['programRequirements']."</td>"; 
                                    echo "<td>".$row['Program Head']."</td>"; 
                                    echo "<td>".$row['programCapacity']."</td>";
                                    echo "<td>".$row['Program Type']."</td>";
                                    echo "<td>". $row['No. of Applicants'] ."<a href='viewProgramApplicants.php?programId=".$row['programId']."'> [View]</a></td>"; 
                                     echo "<td>".$row['Selected Students']."</td>";
                                     if ($row['Mark as Ended']=='Mark as Ended'){
                                         echo "<td><a href='insertReport.php?programId=".$row['programId']."'>[".$row['Mark as Ended']."]</a></td>";
                                     }
                                     if ($row['Mark as Ended']=='See Program Report'){
                                         echo "<td><a href='viewReport.php?programId=".$row['programId']."'>[".$row['Mark as Ended']."]</a></td>";
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
