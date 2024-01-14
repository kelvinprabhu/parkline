<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{



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
	
	<title>PARKLINE |Admin Manage Slots  </title>

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
	<link rel="stylesheet" href="css/manage-vehicles.css">
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

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Vehicles</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Vehicle Details</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                        <th>S.NO</th>
                                            <th>Parking Number</th>
                                        
                                            <th>Vehicle Reg Number</th> 
                                            <th>Action</th>
											<th>CR</th>
										</tr>
									</thead>
                           
									<tfoot>
										<tr>
                                        <th>S.NO</th>
                                            <th>Parking Number</th>
                                         
                                            <th>Vehicle Reg Number</th> 
                                            <th>Action</th>
											<th>CR</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php 
$in="in";
$sql = "SELECT * from tblvehicle WHERE Status='$in'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
	
<td><?php echo $cnt;?></td> 
                                    <td><?php echo htmlentities($result->parkingno);?></td>
                                    <td><?php echo htmlentities($result->uid);?></td>
                                  <td><?php echo htmlentities($result->regno);?></td> 
                                    <td><a href="view-incoming.php?id=<?php echo htmlentities($result->id);?>"class="btn btn-xs btn-primary"><i class="feather icon-clock m-t-10 f-16 " ></i></a>  
                                        <a href="print.php?vid=<?php echo htmlentities($result->id);?>" style="cursor:pointer"  class="btn btn-xs btn-danger"><i class="feather icon-printer   m-t-10 f-16 " ></i></a>
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
<script>
	<?php
		if(isset($_REQUEST['vehicle_or'])) {
	?>
		$('#manage-vehicles-trigger-me-or').click();
	<?php
		}

		if(isset($_REQUEST['vehicle_cr'])){
	?>
		$('#manage-vehicles-trigger-me-cr').click();
	<?php
		}
	?>

</script>
</html>
<?php } ?>
