<?php 
include_once("global.php");
if ($logged==1)
{
    ?>
            <script type="text/javascript">
            window.location = "home.php";
            </script>
    <?php
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    //error handling
    if((!$email)||(!$password)){
    $message = "Please insert both fields.";}
    else{
        $query = "SELECT * FROM registeredMembers WHERE memberEmail = '$email' AND memberPassword='$password' ";
        $result = $con->query($query);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                $memberId = $row['memberId'];
                $memberName = $row['memberName'];
                $memberEmail = $row['memberEmail'];
                $memberPassword = $row['memberPassword'];
            }
            $_SESSION['memberId'] = $memberId;
            $_SESSION['memberName'] = $memberName;
            $_SESSION['memberEmail'] = $memberEmail;
            $_SESSION['memberPassword'] = $memberPassword;
            ?>
            <script type="text/javascript">
            window.location = "home.php";</script>
            <?php
        }
      }
    }

            ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Member login</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New here?
                  <a href="signup.php" class="to_register">Create Account</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Global Student Exchange Program</h1>
                  
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>