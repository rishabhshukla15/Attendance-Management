<?php

include("db.php");
include("header.php");

?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="index.php">Back</a>
		</h2>		
		<div class="panel panel-body">
				<table class="table table-striped">
					<tr>
						<th>#serial number</th>
						<th>Student Name</th>
						<th>Roll number</th>
						<th>Attendence status</th>
					</tr>
					<?php
						$serialnumber=0;
						$counter=0;
						$result=mysqli_query($con,"select * from attendance_records where date='$_POST[date]'");
						while ($row=mysqli_fetch_array($result)) {
							$serialnumber++;
					?>
					<tr> 
						<td><?php echo $serialnumber;?></td>
						<td><?php echo $row['student_name'];?></td>
						<td><?php echo $row['roll_number'];?></td>
						<td>
							<input type="radio" name="attendance_status[<?php echo $counter; ?>]"
							<?php if($row['attendance_status']=="Present")
								echo "checked=checked";
							?> value="Present">Present
							
							<input type="radio" name="attendance_status[<?php echo $counter; ?>]"
							<?php if($row['attendance_status']=="Absent")
								echo "checked=checked";
							?> value="Absent">Absent
							
						</td>
					</tr>
					<?php
						$counter++;
						}
					?>
				</table>			
		</div>
	</div>
