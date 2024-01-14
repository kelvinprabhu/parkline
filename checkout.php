<?php
session_start();
error_reporting(0);
include('includes/config.php');
$txn=rand(100000,999999);


if(isset($_POST['submit']))
{
$email=$_SESSION['uid'];
$amt=$_SESSION['amt'];
$pid=$_SESSION['pid'];
$name=$_POST['name'];
$pno=$_POST['phno'];	
$status=1;

$sql="INSERT INTO pay(tnxid,name,pid,amt,status,uid,phno) VALUES(:tx,:name,:pid,'$amt','$status','$email','$pno')";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':tx',$txn,PDO::PARAM_STR);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($query)
{
    $_SESSION['name']=$name;
    $_SESSION['phno']=$pno;
    $_SESSION['txn']=$txn;
header("Location: pay.php");
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!doctype html>
<html>
<head>
    <style>
        body{

background-color: #eee;
}

.container{

height: 100vh;

}


.card{
border:none;
}

.form-control {
border-bottom: 2px solid #eee !important;
border: none;
font-weight: 600
}

.form-control:focus {
color: #495057;
background-color: #fff;
border-color: #8bbafe;
outline: 0;
box-shadow: none;
border-radius: 0px;
border-bottom: 2px solid blue !important;
}



.inputbox {
position: relative;
margin-bottom: 20px;
width: 100%
}

.inputbox span {
position: absolute;
top: 7px;
left: 11px;
transition: 0.5s
}

.inputbox i {
position: absolute;
top: 13px;
right: 8px;
transition: 0.5s;
color: #3F51B5
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0
}

.inputbox input:focus~span {
transform: translateX(-0px) translateY(-15px);
font-size: 12px
}

.inputbox input:valid~span {
transform: translateX(-0px) translateY(-15px);
font-size: 12px
}

.card-blue{

background-color: #492bc4;
}

.hightlight{

background-color: #5737d9;
padding: 10px;
border-radius: 10px;
margin-top: 15px;
font-size: 14px;
}

.yellow{

color: #fdcc49; 
}

.decoration{

text-decoration: none;
font-size: 14px;
}

.btn-success {
color: #fff;
background-color: #492bc4;
border-color:#492bc4;
}

.btn-success:hover {
color: #fff;
background-color:#492bc4;
border-color: #492bc4;
}


.decoration:hover{

text-decoration: none;
color: #fdcc49; 
}
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title> PARKLINE || Check Out</title>
</head>
<body>


    <div class="container mt-5 px-5">

<div class="mb-4">

    <h2>Confirm order and pay</h2>
<span>please make the payment, after that you can enjoy all the features and benefits.</span>
    
</div>

<div class="row">

<div class="col-md-8">
    

    <div class="card p-3">
<form action="" method="POST">
        <h6 class="text-uppercase">Payment Details</h6>
        <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required"> <span>Name</span> </div>
        

      
            <div class="col-md-6">

                 <div class="d-flex flex-row">


                     <div class="inputbox mt-3 mr-2"> <label for="exampleFormControlInput1" class="form-label">TXN<?php echo $txn; ?></label></div>

                 </div>
                

            </div>
            

        </div>



        <div class="mt-4 mb-4">

            <h6 class="text-uppercase">Billing Details</h6>


            <div class="row mt-3">

                <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input  name="phno" class="form-control" required="required"> <span>Phone NO</span> </div>
                    

                </div>


                 <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="mail" value="<?php echo $email; ?>" class="form-control" required="required"> <span>Email</span> </div>
                    

                </div>
  
            
                

            </div>


        

        </div>

    </div>


    <div class="mt-4 mb-4 d-flex justify-content-between">


              


                <button class="btn btn-success px-3" name="submit" type="submit">Pay <?php echo $amt; ?></button>


                

            </div>
</form>
</div>

<div class="col-md-4">

    <div class="card card-blue p-3 text-white mb-3">

       <span>You have to pay</span>
        <div class="d-flex flex-row align-items-end mb-3">
            <h1 class="mb-0 yellow"><?php echo $amt; ?></h1> 
        </div>

        <span>Enjoy all the features and perk after you complete the payment</span>
        <a href="#" class="yellow decoration">Know all the features</a>

        <div class="hightlight">

          
            

        </div>
        
    </div>
    
</div>

</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>