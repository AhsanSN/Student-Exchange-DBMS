<?php
include_once("database.php");

$viewCountry="select * from countryOffice";
$result_viewCountry = $con->query($viewCountry);

if(isset($_POST['fullName'])){

  $fullName = $_POST['fullName'];
  $mobileNumber = $_POST['mobileNumber'];
  $dob = $_POST['dob'];
  $position = $_POST['position'];
  $doj = $_POST['doj'];
  $salary = $_POST['salary'];
  $email = $_POST['email'];
  $countryOffice = $_POST['countryOffice'];
  
  $sql=" INSERT INTO  employee(countryOffice_countryCode, employeeFullName, employeeJoiningDate, employeeDOB, employeePhone, employeeEmail, employeeSalary, employeeType )
VALUES ('$countryOffice', '$fullName', '$doj',  '$dob',
		'$mobileNumber', '$email', '$salary', '$position')
		";
        if(!mysqli_query($con,$sql))
        {
        echo"error";
        }
        

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="fullName" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                
                      <br>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="email" type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Position<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" name="position" class="select2_single form-control" tabindex="-1">
                            <option value="1">Program Head</option>
                            <option value="2">Interviewer</option>
                            <option value="3">Director</option>
                            <option value="4">Marketing</option>
                            <option value="5">Human Resource</option>
                          </select>
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Country Office<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" name="countryOffice" class="select2_single form-control" tabindex="-1">
                            <?php
                              if ($result_viewCountry->num_rows > 0) {
                                while($row= $result_viewCountry->fetch_assoc())
                                {
                                    echo"<option value='". $row['countryCode']."'>".$row['countryName']."</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      </div>
                    </div>


                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Joining<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="date" max="12-31-2059" min="12-31-2000" name="doj" class="form-control">
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
