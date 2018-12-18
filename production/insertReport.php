<?php

include_once("database.php");

if(isset($_GET['programId'])){
if(isset($_POST['accomodationRating'])){

  $program_programId = $_GET['programId'];
  $accomodationRating = $_POST['accomodationRating'];
  $travelRating = $_POST['travelRating'];
  $experienceRating = $_POST['experienceRating'];
  $workRating = $_POST['workRating'];

   mysqli_query($con,"START TRANSACTION");

    $a1 = mysqli_query($con,"UPDATE program
        SET programEndDate = NOW()
        WHERE programId = '$program_programId';");

    $a2 = mysqli_query($con,"INSERT INTO programReport
        VALUES ('$program_programId', '$accomodationRating', '$travelRating', '$experienceRating', '$workRating');");
    
    $a3 = mysqli_query($con,"select
    	@AddCredit = payPerDay * Duration 
    	from
    	(select payPerDay
    	from programFinance
    	where program_programId = '$program_programId') aa ,
    	(select TIMESTAMPDIFF(day, programStartDate, programEndDate) as `Duration`
    	from program
    	where programId = '$program_programId') ab;");
	
    $a4 = mysqli_query($con,"UPDATE memberAccount
        SET currentBalance = currentBalance + @AddCredit
        where registeredMembers_memberId in (select iv.programApplicant_registeredMembers_memberId
        from program pr inner join interview iv on pr.programId = iv.programApplicant_program_programId
        				where pr.programId = '$program_programId'
        				and iv.interviewResult = 'Selected'
        				);");
        				
    $a5 = mysqli_query($con,"UPDATE memberAccount
        SET totalBalance = totalBalance + @AddCredit
        where registeredMembers_memberId in (select programApplicant_registeredMembers_memberId
        from program pr inner join interview iv on pr.programId = iv.programApplicant_program_programId
        				where pr.programId = '$program_programId'
        				and iv.interviewResult = 'Selected'
        				);");

    if ($a1 and $a2 and $a3 and $a4 and $a5) {
        mysqli_query($con,"COMMIT");
        echo "done!";
    } else {        
        mysqli_query($con,"ROLLBACK");
        
        echo "errorrrrr!";
    }

/**
  $sql=" insert into programReport(program_programId, accomodationRating, travelRating, experienceRating,
		workRating)
values ($program_programId, $accomodationRating, $travelRating, $experienceRating,
		$workRating)";
		
		$sql="CALL EndProgram(programId,accomodationRating,travelRating,experienceRating,workRating)";
		
        if(!mysqli_query($con,$sql))
        {
        echo"error";
        }
        **/
        
   
}
}
else{
    echo "error";
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
                    <h2>Mark Program as Ended</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Accomodation Rating<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="accomodationRating" class="select2_single form-control" tabindex="-1">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Travel Rating<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="travelRating" class="select2_single form-control" tabindex="-1">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Experience Rating<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="experienceRating" class="select2_single form-control" tabindex="-1">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                      </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Rating<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                        
                          <select required="required" id="organization" name="workRating" class="select2_single form-control" tabindex="-1">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                      </div>
                      </div>
                    </div>
                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="./" class="btn btn-primary" type="button">Cancel</a>
                          <button type="submit" class="btn btn-success">End Program</button>
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
