<?php
session_start();
error_reporting(0);
include('includes/config.php');


if(isset($_REQUEST['del']))
{
	$i=1;
	if($i===1)
	{
	$delid=intval($_GET['del']);
$sqli="SELECT parkingno,intime ,outtime,charge from tblvehicle where id = :delid";
$queryi = $dbh -> prepare($sqli);

$queryi -> bindParam(':delid',$delid, PDO::PARAM_INT);
$queryi->execute();
$res=$queryi->fetchAll(PDO::FETCH_OBJ);
$row = mysqli_fetch_assoc($res);
    
$in= $row["intime"];
$out= $row["outtime"];
$charge= $row["charge"];
$pid= $row["parkingno"];
$time_diff = $out-$in;

$h = floor($time_diff / 3600);
$d = floor($time_diff / (60 * 60 * 24));
if($h<=5)
{
	$car=40 + $charge;
	$i--;
}
elseif($h>5 and $h<=10)
{
	$car=80 + $charge;
	$i--;
}
elseif($h>10 and $h<=20)
{
	$car=120 + $charge;
	$i--;
}
elseif($h>20 and $h<=30)
{
	$car=140 + $charge;
	$i--;
}
elseif($d>2 and $d<=3)
{
	$car=200  + $charge;
	$i--;
}
elseif($d>3 and $d<=5)
{
	$car=300  + $charge;
	$i--;
}
else
{
	$car=600 + $charge;
	$i--;
}



	}
    $o="out";

$sql = "UPDATE tblvehicle SET status='$o',outtime='current_timestamp()', charge='$car' WHERE id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_INT);
$query -> execute(); 
if($query){
$msg="Vehicle been out of slot successfully ur Parking charge is".$car;
}
else{
	$msg="Vehicle been out of slot successfully ur Parking charge is".$car;
	$_SESSION['amt']=$car;
	$_SESSION['pid']=$wid;

	header("Location: checkout.php");
}
}
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PARKLINE | Manage Slots   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="admin/css/style.css">
	<!-- One Signal -->
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

	<?php include('alt_includes/header.php');?>
	
	<div class="ts-main-content" style="padding:50px;">
		<div class="container-text">
		</div>
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Slot Vehicles</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Vehicle Details</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>PARKING NO</th>
											<th>LOCATION</th>
											<th>VEHICLE</th>
											<th>REG NO</th>
											<th>IN TIME</th>
									        <th>ACTION OUT</th>
											<th>PRINT</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>PARKING NO</th>
											<th>LOCATION</th>
											<th>VEHICLE</th>
											<th>REG NO</th>
											<th>IN TIME</th>
											<th>BASIC CHARGE</th>
											<th>ACTION OUT</th>
											<th>PRINT</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php $sqla = "SELECT * from tblvehicle uid = :uid";
$querya = $dbh -> prepare($sqla);

$querya->bindParam(':uid',$_SESSION['uid'],PDO::PARAM_INT);
$querya->execute();
$results=$querya->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($querya->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->parkingno);?></td>
											<td><?php echo htmlentities($result->location);?></td>
											<td><?php echo htmlentities($result->vname);?></td>
											<td><?php echo htmlentities($result->regno);?></td>
												<td><?php echo htmlentities($result->intime);?></td>
												<td><?php echo htmlentities($result->charge);?></td>
		<td>
<a href="my-slot.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to exit ur vehicle from the slot');"><i class="fa fa-car" id="del"></i></a></td>

<td>

 <a href="print.php?id=<?php echo $result->id; ?>&amt=<?php echo $result->charge; ?>" onclick="return confirm('Do you want to proceed for payment and print');"><i class="fa fa-car"></i></a>


</td>	
   
</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="admin/js/jquery.min.js"></script>
	<script src="admin/js/bootstrap-select.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
	<script src="admin/js/jquery.dataTables.min.js"></script>
	<script src="admin/js/dataTables.bootstrap.min.js"></script>
	<script src="admin/js/Chart.min.js"></script>
	<script src="admin/js/fileinput.js"></script>
	<script src="admin/js/chartData.js"></script>
	<script src="admin/js/main.js"></script>
  <?php  include('one-signal-check.php'); ?>
</body>
</html>

