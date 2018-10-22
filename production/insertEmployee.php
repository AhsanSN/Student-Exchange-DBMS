<?php

if(isset($_POST['firstName'])){

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $mobileNumber = $_POST['mobileNumber'];
  $emergencyMobileNumber = $_POST['emergencyMobileNumber'];
  $cnic = $_POST['cnic'];
  $dob = $_POST['dob'];
  $department = $_POST['department'];
  $position = $_POST['position'];
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
                    <h2>Add Employee</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insertEmployee.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="firstName" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="lastName" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input required="required" type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input required="required" type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" name="mobileNumber" type="text" class="form-control" data-inputmask="'mask': '+99-9999999999'">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Emergency Mobile Number<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input type="text" name="emergencyMobileNumber" class="form-control" data-inputmask="'mask': '+99-9999999999'">
                      </div>
                      </div>
                    </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          <input required="required" type="text" name="cnic" class="form-control" data-inputmask="'mask': '99-99-9999'">
                      </div>
                      </div>
                    </div>
        
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="dob" class="form-control" data-inputmask="'mask': '99/99/9999'">
                      </div>
                      <hr>
                      </div>
                    </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Department<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" name="department" class="select2_single form-control" tabindex="-1">
                            <option value="Accounting">Accounting</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Sales">Sales</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Security">Security</option>
                            <option value="IT">IT</option>
                          </select>
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Position<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" name="position" class="select2_single form-control" tabindex="-1">
                            <option value="Director">Director</option>
                            <option value="General Manager">General Manager</option>
                            <option value="Ast. General Manager">Ast. General Manager</option>
                            <option value="Manager">Manager</option>
                            <option value="Ast. Manager">Ast. Manager</option>
                          </select>
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Joining<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="doj" class="form-control" data-inputmask="'mask': '99/99/9999'">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Salary<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="salary" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Car (if applicable)<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select name="car" class="select2_single form-control" tabindex="-1">
                            <option value="none"> </option>
                            <option value="Suzuki Mehran">Suzuki Mehran</option>
                            <option value="Suzuki Cultus">Suzuki Cultus</option>
                            <option value="Toyota Corolla">Toyota Corolla</option>
                            <option value="Honda City">Honda City</option>
                          </select>
                      </div>
                      </div>
                    </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
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
            <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>


    	<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  </body>

</html>
