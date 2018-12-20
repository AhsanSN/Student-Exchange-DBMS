<?php

include_once("database.php");

if(isset($_POST['countryCode'])){

  $name = $_POST['name'];
  $countryCode = $_POST['countryCode'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phoneNumber'];

    $sql=" insert into sponsor (countryOffice_countryCode, sponsorName, 	sponsorEmail,sponsorPhone) values ('$countryCode', '$name', '$email', '$phoneNumber')";
        if(!mysqli_query($con,$sql))
        {
        echo"error";
        }
        
}

$viewOrg="select countryCode, countryName from countryOffice";
$result_viewOrg = $con->query($viewOrg);     


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
                    <h2>Insert Sponser</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="name" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Country Office<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="countryCode" class="select2_single form-control" tabindex="-1">
                            <?php
                              if ($result_viewOrg->num_rows > 0) {
                                while($row= $result_viewOrg->fetch_assoc())
                                {
                                    echo " <option value='".$row['countryCode']."'>".$row['countryName']."</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      </div>
                    </div>
                   
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="email" name="email" class="form-control" >
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" name="phoneNumber" type="text" class="form-control" data-inputmask="'mask': '+99-9999999999'">
                      </div>
                      </div>
                    </div>

                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button type="submit" class="btn btn-success">Add</button>
                        </div>
                      </div>
                    </form>
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
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
            <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

  </body>

</html>
