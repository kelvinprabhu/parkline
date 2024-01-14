<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
$loc=$_POST['location'];
$add=$_POST['address'];
$slot=$_POST['slot'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$vimage1=$_FILES["img1"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/warehouse/" . $_FILES["img1"]["name"]);
$wid=mt_rand(100000000, 999999999);
$sql="INSERT INTO warehouse VALUES('$wid','$loc','$add','$slot','$price','$desc','$vimage1')";
$query = $dbh->prepare($sql);
$query->execute();

if($query)
{
$msg="Vehicle posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
  }?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PARKLINE | Add WAREHOUSE</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/map.css">
	<link rel="stylesheet" href="css/form-buttons.css">
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
	
	<?php include('includes/header.php');?>
	
	<div class="content-wrapper">
	<div class="container-fluid">
	<div class="ts-main-content">
		<div class="">
		       <div style="margin-top:5%;">
		       
		   </div>
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">WAREHOUSE</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">location<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="location" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-4">
<input class="form-control" name="address" required>

</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="desc" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" required>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Slot<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="slot" class="form-control" required>
</div>



</div>



<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>

</div>



</div>

	
	
</div>
</div>

</div>

</div>

							

									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group text-right">
							<button class="btn btn-default" type="reset" id="btn-cancel">Clear Fields</button>
							<button class="btn btn-primary" name="submit" type="submit" id="btn-save">Save changes</button>
						</div>
						
					</div>
				</div>
				</form>
				</div>

			</div>
		</div>
	</div>
	</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>
} ?>