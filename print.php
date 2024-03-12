<!DOCTYPE html>
<?php
    $uid=$_GET['rid'];
	require 'partials/db_connect.php';
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
            border:3px solid black
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	<b style="color:blue; text-align:center;" >Candidate Report Data</b><br>Date:
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table class="table table-striped">
		<thead>
			<tr>
				    <th >Sno.</th>
                    <th >Full Name</th>
                    <th >Email</th>
                    <th >Experience</th>
                    <th >Status</th>

			</tr>
		</thead>
		<tbody>
			<?php
				require 'partials/db_connect.php';
				
              
                    $query = $conn->query("SELECT * FROM `applyjob` where rid='$uid'");

               $i=1;
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $i?></td>
				<td style="text-align:center;"><?php echo $fetch['name']?></td>
				<td style="text-align:center;"><?php echo $fetch['email']?></td>
				<td style="text-align:center;"><?php echo $fetch['experience']?></td>
				<td style="text-align:center;"><?php echo $fetch['status']?></td>

			</tr>
			
			<?php
            $i++;
				}
			?>
		</tbody>
	</table>
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>


