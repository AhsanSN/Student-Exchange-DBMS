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
                    <h2>Register Student</h2>
                   
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
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" name="email" type="email" class="form-control">
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
                        
                          <input required="required" type="date" name="dob" class="form-control" max="12-31-2014" min="12-31-1950">
                      </div>
                      <hr>
                      </div>
                    </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Country<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="country" name="country" class="select2_single form-control" tabindex="-1">
                            <option value="Pakistan">Pakistan</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="China">China</option>
                            <option value="Sirlanka">Sirlanka</option>
                          </select>
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">City<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">

                          <select required="required" id="city" name="city" class="select2_single form-control" tabindex="-1">
                            <option value=" "></option>
                          </select>
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">University<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="university" class="form-control">
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


    	<script>

  $(document).ready(function () {
    $("#country").change(function () {
        var val = $(this).val();
        if (val == "Pakistan") {
            $("#city").html("<option value='Karachi'>Karachi</option><option value='Islamabad'>Islamabad</option><option value='Rawalpindi'>Rawalpindi</option><option value='Sukkur'>Sukkur</option>");
        } 
        else if (val == "India") {
            $("#city").html("<option value='New Dehli'>New Dehli</option><option value='Calcutta'>Calcutta</option><option value='Banglore'>Banglore</option><option value='Bombay'>Bombay</option>");
        } 
        else if (val == "China") {
            $("#city").html("<option value='Beijing'>Beijing</option><option value='Shanghai'>Shanghai</option>");
        } 
        else if (val == "USA") {
            $("#city").html("<option value='New York'>New York</option><option value='Houston'>Houston</option><option value='California'>California</option>");
        }
        else if (val == "Sirlanka") {
            $("#city").html("<option value='Sigiriya'>Sigiriya</option><option value='Kandy'>Kandy</option><option value='Galle'>Galle</option>");
        }
    });
});

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
