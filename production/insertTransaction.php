<?php

if(isset($_POST['title'])){

  $title = $_POST['title'];
  $recipent = $_POST['recipent'];
  $amount = $_POST['amount'];

  //echo "$name. $mobileNumber.$address";
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
        <?php if(isset($_GET['type'])){
            if(($_GET['type'] == "debit") || ($_GET['type'] == "credit")){
              ?>
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
                    <h2><?php if(isset($_GET['type'])){
                      if($_GET['type'] == "debit"){
                        echo "Debit - Send Cash";
                      }
                      if($_GET['type'] == "credit"){
                        echo "Credit - Receive Cash";
                      }
                    }?></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insertTransaction.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="title" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recipent<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="recipent" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          <input required="required" type="number" name="amount" class="form-control" min="0">
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
      <?php }};?>
        <!-- /footer content -->
      </div>
    </div>
    <?php include_once("./phpParts/endScripts.php")?>
  </body>

</html>
