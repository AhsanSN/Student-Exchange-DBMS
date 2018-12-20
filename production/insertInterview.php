<?php

include_once("database.php");

if(isset($_GET['programId'])&&isset($_GET['studentId'])&&isset($_GET['appId'])){

  $programId = $_GET['programId'];
  $studentId = $_GET['studentId'];
  $appId = $_GET['appId'];

    $viewEmployee="select em.employeeId, em.employeeFullName
                from employee em
                where em.employeeType = 2";
    $result_viewEmployee = $con->query($viewEmployee);
    
    if(isset($_POST['employeeId'])){
        
    $employeeId = $_POST['employeeId'];
    $interviewLocation = $_POST['location'];
    $interviewDate = $_POST['date'];
    $interviewTime = $_POST['time'];

    echo "$employeeId.$interviewDateTime.$interviewDateTime.$interviewLocation";
    $sql="insert into interview(programApplicant_program_programId, 
    	programApplicant_registeredMembers_memberId, programApplicant_appId, employee_employeeId,
    	interviewLocation, interviewDate, interviewTime,interviewResult)
    values ('$programId', 
    	'$studentId', '$appId', '$employeeId','$interviewLocation', '$interviewDate', '$interviewTime', 'Pending')
	";
    if(!mysqli_query($con,$sql))
        {
        echo"error";
        }
}

}
else{
    echo "There seems to be some kind of error!";
    exit();
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
                    <h2>Call for Interview </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

        
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Interview<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="date" name="date" class="form-control" max="12-31-2014" min="12-31-1950">
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Time of Interview<span class="required"></span>
                        </label>
                        
                        
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker3'>
                            <input type='text' name="time" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                        </div>
                
                      </div>
                      
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Location<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="location" class="form-control">
                      </div>
                      </div>
                    </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Interviewer<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" name="employeeId" class="select2_single form-control" tabindex="-1">
                              
                              <?php
                              if ($result_viewEmployee->num_rows > 0) {
                                while($row= $result_viewEmployee->fetch_assoc())
                                {
                                    echo " <option value='".$row['employeeId']."'>".$row['employeeFullName']."</option>";
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
                          <button type="submit" class="btn btn-success">Confirm</button>
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
