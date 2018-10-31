<?php

if(isset($_POST['name'])){

  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phoneNumber'];

  //echo "$firstName. $lastName.$gender.$mobileNumber.$emergencyMobileNumber.$cnic.$dob.$department.$position.$doj.$salary.$car";
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
                    <h2>Insert Organization</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insertEmployee.php" method="post">

                                  
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="name" class="form-control">
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="Email" name="email" class="form-control">
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <input required="required" type="text" name="address" class="form-control">
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