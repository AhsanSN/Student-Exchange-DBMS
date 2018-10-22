<?php

if(isset($_POST['name'])){

  $name = $_POST['name'];
  $mobileNumber = $_POST['mobileNumber'];
  $address = $_POST['address'];
  $products = $_POST['products'];

  echo "$name. $mobileNumber.$address";
  for ($i=0; $i < sizeof($products); $i++) { 
    echo $products[$i];
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
                    <h2>Add Dealer</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insertDealer.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="name" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          <input required="required" type="email" name="email" class="form-control">
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                          <input required="required" type="text" name="address" class="form-control">
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dealed Products<span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                      <p style="padding: 5px;">
                        <input type="checkbox" name="products[]" id="hobby1" value="Brake Oil" data-parsley-mincheck="2" class="flat" />Brake Oil
                        <br />

                        <input type="checkbox" name="products[]" id="hobby2" value="run" class="flat" /> Running
                        <br />

                        <input type="checkbox" name="products[]" id="hobby3" value="eat" class="flat" /> Eating
                        <br />

                        <input type="checkbox" name="products[]" id="hobby4" value="sleep" class="flat" /> Sleeping
                        <br />
                        <p>
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
            <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
  </body>

</html>
