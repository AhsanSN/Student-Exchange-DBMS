<?php

if(isset($_POST['firstName'])){

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $mobileNumber = $_POST['mobileNumber'];
  $emergencyMobileNumber = $_POST['emergencyMobileNumber'];
  $cnic = $_POST['cnic'];
  $dob = $_POST['dob'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $doj = $_POST['doj'];
  $salary = $_POST['salary'];
  $car = $_POST['car'];

  echo "$firstName. $lastName.$gender.$mobileNumber.$emergencyMobileNumber.$cnic.$dob.$department.$position.$doj.$salary.$car";
}

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
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                    
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                     
                        </tr>
                        <tr>
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <td>22</td>
                         
                        </tr>
                        
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
