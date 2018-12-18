<?php

include_once("database.php");

if(isset($_POST['name'])){

  $name = $_POST['name'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $location = $_POST['visitLocation'];
  $startDate = $_POST['startDate'];
  $startDate=date("Y-m-d H:i:s",strtotime($startDate));
  
  $description = $_POST['description'];
  $requirement = $_POST['requirement'];
  
  $employee = $_POST['empHead'];
  $type = $_POST['programType'];
  $capacity = $_POST['capacity'];
  $organizationId = $_POST['organization'];

  //echo "$name.$country.$city.$country.$location.$startDate.$description.$requirement";
  
  $sql=" INSERT INTO  program (employee_employeeId, organization_orgId, programName, programCountry, programCity, programLocation, programStartDate, programEndDate, programDescription, programRequirements, programType, programCapacity)
VALUES ('$employee', '$organizationId', '$name', '$country', '$city', '$location', '$startDate' , NULL, '$description', '$requirement', '$type', '$capacity') ";
        if(!mysqli_query($con,$sql))
        {
        echo"error";
        }
        
}


$viewEmployee="select em.employeeId, em.employeeFullName, em.employeetype
                from employee em where em.employeetype = 1
                ";
    $result_viewEmployee = $con->query($viewEmployee);
   
  $viewOrg="select * from organization
                ";
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
                    <h2>Create Program</h2>
                   
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Organization<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="organization" class="select2_single form-control" tabindex="-1">
                            <?php
                              if ($result_viewOrg->num_rows > 0) {
                                while($row= $result_viewOrg->fetch_assoc())
                                {
                                    echo " <option value='".$row['orgId']."'>".$row['orgName']."</option>";
                                }
                              }
                              ?>
                          </select>
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="programType" class="btn-group" data-toggle="buttons">
                            <label onclick="show()" class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input required="required" type="radio" name="programType" value="1"> &nbsp; Paid &nbsp;
                            </label>
                            <label onclick="hide()" class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input required="required" type="radio" name="programType" value="0"> Unpaid
                            </label>
                          </div>
                        </div>
                      </div>
                      
                      <div id="amount">
                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pay Per day<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="number" name="capacity" class="form-control" >
                      </div>
                      </div>
                    </div>
                          
                      </div>
                   
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="date" name="startDate" class="form-control" max="12-31-2014" min="12-31-1950">
                      </div>
                      </div>
                    </div>


                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Country<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          <input type="text" name="country" id="autocomplete-custom-append" class="form-control col-md-10"/>
                      </div>
                      </div>
                      </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">City<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="city" class="form-control" >
                      </div>
                      </div>
                    </div>

                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Visit Location<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="visitLocation" class="form-control" >
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Head<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="empHead" class="select2_single form-control" tabindex="-1">
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

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <textarea required="required" type="text" name="description" class="form-control"></textarea> 
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Requirement<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <textarea required="required" type="text" name="requirement" class="form-control"></textarea> 
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Capacity<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="number" name="capacity" class="form-control" >
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
    
    function hide(){
        document.getElementById("amount").style.display='none';
    }
    function show(){
        document.getElementById("amount").style.display='block';
    }
</script>
  </body>

</html>
