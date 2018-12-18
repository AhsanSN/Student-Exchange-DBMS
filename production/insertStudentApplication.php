<?php
include_once("database.php");

$viewMembers="select memberId, memberFullName, memberEmail from registeredMembers";
$result_viewMembers = $con->query($viewMembers);

$viewProgram="select programId, programName from program";
$result_viewProgram = $con->query($viewProgram);

if(isset($_POST['student'])){

  $student = $_POST['student'];
  $program = $_POST['program'];


  //echo "$countryOffice. $city.$email.$phoneNumber.$address";
  
  $sqli="INSERT INTO programApplicant (registeredMembers_memberId, program_programId) VALUES ('$student', '$program')";
        if(!mysqli_query($con,$sqli))
        {
        echo"Error adding entry.";
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
                    <h2>Apply for program</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Student<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="student" name="student" class="select2_single form-control" tabindex="-1">
                              <?php
                              if ($result_viewMembers->num_rows > 0) {
                                while($row= $result_viewMembers->fetch_assoc())
                                {
                                    echo"<option value='". $row['memberId']."'>".$row['memberFullName']." (".$row['memberEmail'].")</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      </div>
                    </div>
                   
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Programme<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="program" name="program" class="select2_single form-control" tabindex="-1">
                              <?php
                              if ($result_viewProgram->num_rows > 0) {
                                while($row= $result_viewProgram->fetch_assoc())
                                {
                                    echo"<option value='". $row['programId']."'>".$row['programName']."</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      </div>
                    </div>

                               
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button type="submit" class="btn btn-success">Apply</button>
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
