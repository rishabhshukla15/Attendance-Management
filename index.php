<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}
include("db.php");
include("header.php");
$idd=1;
$flag=0;
$update=0;
if(isset($_POST['submit']))
{
	$date=date("Y-m-d");
	$records=mysqli_query($con,"select * from attendance_records where date='$date'");
	$num=mysqli_num_rows($records);
	if($num)
	{
		foreach($_POST['attendance_status'] as $id=>$attendance_status)
		{
			$student_name=$_POST['student_name'][$id];
			$roll_number=$_POST['roll_number'][$id];
			$result=mysqli_query($con,"update attendance_records set student_name='$student_name',roll_number='$roll_number',attendance_status='$attendance_status',date='$date' where date='$date'");
			$idd++;
			if($result)
			{
				$update=1;
			}
		}
	}
	else
	{
		foreach($_POST['attendance_status'] as $id=>$attendance_status)
		{
			$student_name=$_POST['student_name'][$id];
			$roll_number=$_POST['roll_number'][$id];
			$date=date("Y-m-d H:i:s");
			$result=mysqli_query($con,"insert into attendance_records(id,student_name,roll_number,attendance_status,date)values('$idd','$student_name','$roll_number','$attendance_status','$date')");
			$idd++;
			if($result)
			{
				$flag=1;
			}
		}
	}
}
?>

<div class="panel panel-default panel-transparent">
	<div class="panel panel-heading">
		<h3>Welcome, <?php echo $_SESSION['username']; ?>!
			<a class="btn btn-danger pull-right" href="logout.php">Logout</a>
		</h3>
		<hr>
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="view_all.php">View All</a>
		</h2>
		<?php
			if($flag)
	 		{
		?>
		<div class="alert alert-success">
			Attendence Data Inserted Successfully!
		</div>
		<?php
			}
		?>
		<?php
			if($update)
	 		{
		?>
		<div class="alert alert-success">
			Attendence Data Updated Successfully!
		</div>
		<?php
			}
		?>
		<h3><div class="well text-center">Date:<?php echo date("Y-m-d")?></div></h3>

		<div class="panel panel-body">
			<form action="index.php" method="post">
				<table class="table table-striped">
					<tr>
						<th>Serial number</th>
						<th>Student Name</th>
						<th>Roll number</th>
						<th>Attendance status</th>
					</tr>
					<?php
						$serialnumber=0;
						$counter=0;
						$result=mysqli_query($con,"select * from attendance");
						while ($row=mysqli_fetch_array($result)) {
							$serialnumber++;
					?>
					<tr>
						<td><?php echo $serialnumber;?></td>
						<td><?php echo $row['student_name'];?></td>
						<input type="hidden" value="<?php echo $row['student_name'];?>" name="student_name[]">
						<td><?php echo $row['roll_number'];?></td>
						<input type="hidden" value="<?php echo $row['roll_number'];?>" name="roll_number[]">
						<td>

							<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present"
							<?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present")
							{
								echo "checked=checked";
							}?> required>Present

							<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent"
							<?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent")
							{
								echo "checked=checked";
							}?> required>Absent
						</td>
					</tr>
					<?php
						$counter++;
						}
					?>
				</table>
				<input type="submit" name="submit" value="submit" class="btm btn-primary ">
			</form>

		</div>
	</div>

</div>
