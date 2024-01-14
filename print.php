<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/stylep.css">
    </head>
<body>

<?php
 $cid=$_GET['id'];
$ret=mysqli_query($conn,"select * from tblvehicle where id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
  ?>

<div  id="exampl">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> PARKLINE Parking receipt</th>

        </tr>
        <tr>
          <th>Parking Number</th>
              <td><?php  echo $row['parkingno'];?></td>
                        

          <th>Vehicle Category</th>
              <td>Two/four Wheeler</td>
              </tr>
              <tr>
          <th>Vehicle Company Name</th>
              <td><?php  echo $row['vname'];?></td>
        
          <th>Registration Number</th>
              <td><?php  echo $row['regno'];?></td>
              </tr>
              <tr>
              <th>Owner Id</th>
                <td><?php  echo $row['uid'];?></td>
            
               
              </tr>
              <tr>
          <th>In Time</th>
          <td><?php  echo $row['intime'];?></td>
          <th>Status</th>
          <td> 
            <?php  
            if($row['Status']=="")
            {
              echo "Incoming Vehicle";
            }
            if($row['Status']=="out")
            {
              echo "Outgoing Vehicle";
            } ;
            ?>
          </td>
      </tr>
      
      <tr>
        <th>Out time</th>
        <td><?php  echo $row['outtime'];?></td>
        <th>parking Charge</th>
        <td><?php  echo $row['charge'];?></td>
      </tr>
     

      <?php } ?>
        <tr>
          <td colspan="4" style="text-align:center; cursor:pointer"><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)"  ></i></td>
        </tr>
    </table>

  </div>
<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script> 

</body>
</html>