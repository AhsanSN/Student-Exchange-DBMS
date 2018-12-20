<?
/**
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
**/
session_start();

//maybe you want to precise the save path as well
include_once("database.php");

//maybe you want to precise the save path as well

//cheaking
if(isset($_SESSION['memberId']))
{
    $session_memberId = $_SESSION['memberId'];
    $session_memberEmail = $_SESSION['memberEmail'];
    $session_memberName = $_SESSION['memberName'];
    $session_memberPassword = $_SESSION['memberPassword'];

//if memebr logged in
$query = "SELECT *  FROM registeredMembers WHERE memberEmail='$session_memberEmail' AND memberPassword='$session_memberPassword' ";
$result = $con->query($query);
if ($result->num_rows > 0){
    $logged=1;
}
else
{
    ?>
    <script type="text/javascript">
    window.location = "login.php";</script>
    <?php
}
}
else
{
        //echo"user logged out";
        $logged=0;
}
?>