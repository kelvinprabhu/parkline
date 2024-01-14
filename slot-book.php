<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{	
header('location:index.php');
}


if(isset($_POST['send']))
  {
$name=$_POST['vname'];
 
$reg=$_POST['rno'];
$phno=$_POST['pno'];
$wid=$_GET['wid'];
$amt=$_GET['amt'];
$ownername=$_SESSION['uid'];
$address=$_POST['add'];
$s="in";
$sql="INSERT INTO  tblvehicle(parkingno,location,vname,regno,intime,outtime,charge,status,uid) VALUES(`$wid`,`$address`,`$name`,`$reg`,'current_timestamp()','','$amt','$s',`$ownername`)";
$query = $dbh->prepare($sql);

$query->execute();
if($query)
{
$msg="Slot Booked Successfully";

}
else 
{
$error="Something went wrong. Please try again";
}
  
  }

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>PARKLINE | slot</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" data-default-color="true"/>
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />    
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/3.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/3.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/3.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/3.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script src="onesignal.js"></script>
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>

<!-- Start Switcher -->
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>SLOT BOOKING</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Slot</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Contact-us-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <h3>book your parking slot using form below</h3>
          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="contact_form gray-bg">
          <form  method="post">
           
            <div class="form-group">
              <label class="control-label">Vehicle Brand Name <span>*</span></label>
              <input type="text" name="vname" class="form-control white_bg"  required>
            </div>
            <div class="form-group">
              <label class="control-label">REG NO<span>*</span></label>
              <input type="text" name="rno" class="form-control white_bg"  required>
            </div>                     
           
            <div class="form-group">
              <label class="control-label">Address <span>*</span></label>
              <input type="text" name="add" class="form-control white_bg"  rows="11" cols="22" required>
            </div>
          
            <div class="form-group">
              <button class="btn" type="submit" name="send" >BOOK SLOT<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    
    </div>
  </div>
</section>
<!-- /Contact-us--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>
