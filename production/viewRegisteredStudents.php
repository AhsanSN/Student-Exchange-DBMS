<?php

include_once("database.php");

$viewProg="CALL ViewMembers()";
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
                    <h2>View Registered Students</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Country</th>
                          <th>City</th>
                          <th>Date of Birth</th>
                          <th>University</th>
                          <th>Member since</th>
                          <th>Email</th>
                          <th>Programs Selected for</th>
                          <th>Programs Applied for</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            if ($result_viewProg->num_rows > 0) {
                                while($row= $result_viewProg->fetch_assoc())
                                {
                                    
                                    echo "<tr>";
                                    echo "<td>".$row['memberFullName']."</td>";
                                    echo "<td>".$row['countryName']."</td>"; 
                                    echo "<td>".$row['chapterCity']."</td>"; 
                                    echo "<td>".$row['memberDOB']."</td>"; 
                                    echo "<td>".$row['memberUniversity']."</td>"; 
                                    echo "<td>".$row['memberJoinDate']."</td>"; 
                                    echo "<td>".$row['memberEmail']."</td>"; 
                                    echo "<td>".$row['Program(s) Selected for']."<a href='viewStudentSelectedPrograms.php?id=".$row['memberId']."'> [View]</a></td>"; 
                                    $a = $row['Programs Applied for']-1;
                                    echo "<td>".$a."</td>"; 
                                    
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
