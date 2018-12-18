<?php

include_once("database.php");

$viewchapters="
select cc.countryName, cc.chapterCity, cc.chapterAddress, cc.chapterEmail, cc.chapterPhone, rm.`No. of Registered Members`
from
(
select *
from  cityChapter inner join  countryOffice on countryOffice_countryCode = countryCode
) cc
left outer join
(
select chapterId, COUNT(*) as `No. of Registered Members`
from  cityChapter left outer join  registeredMembers on chapterId = cityChapter_chapterId
    where memberId is not null
group by chapterId
) rm 
on cc.chapterId = rm.chapterId
";
$result_viewchapters = $con->query($viewchapters);


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
                    <h2>View Chapters</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Country</th>
                          <th>City</th>
                          <th>Address</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Registered Members</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                              if ($result_viewchapters->num_rows > 0) {
                                while($row= $result_viewchapters->fetch_assoc())
                                {
                                    
		
                                    echo "<tr>";
                                    echo "<td>".$row['countryName']."</td>";
                                    echo "<td>".$row['chapterCity']."</td>";
                                    echo "<td>".$row['chapterAddress']."</td>";
                                    echo "<td>".$row['chapterEmail']."</td>";
                                    echo "<td>".$row['chapterPhone']."</td>";
                                    echo "<td>".$row['No. of Registered Members']."</td>";
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
