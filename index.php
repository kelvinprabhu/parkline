<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>PARKLINE</title>


<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

<!--Custome Style -->
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
<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png"> -->
<!-- <img src="assets/images/3.jpg" style="width:60%"> -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/3.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/3.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/3.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/3.jpg">
<link rel="stylesheet" href="assets/css/map.css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="assets/css/modal_confirmation.css">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script src="onesignal.js"></script>
</head>
<body>

<!-- Start Switcher -->
<!-- /Switcher -->  



<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img_1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img_3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
  </div>

</div>

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

<!-- Scripts --> 

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
<!--Google Maps API--> 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5PPR2NTq1Q8W3oQQB5EBBP5dc0DaDO2I&libraries=places&callback=myMap" async differ></script>
<script type="text/javascript">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</script>
</html>
