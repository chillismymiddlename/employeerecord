<?php
include("connection.php");
//error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data</title>

	<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Employee Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Employee Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Master Data</a></li>
					<li><a href="add.php">Add Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Employee Data &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$emp_id = $_GET['emp_id'];
			$sql = mysqli_query($con, "SELECT * FROM employee WHERE emp_id='$emp_id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$email			 = $_POST['email'];
				$name		     = $_POST['name'];
				$address	 	 = $_POST['address'];
				$dob	         = $_POST['dob'];
				$phone		     = $_POST['phone'];
				$dept	         = $_POST['dept'];
				$status			 = $_POST['status'];
				
				$update = mysqli_query($con, "UPDATE employee SET emp_name='$name', emp_email='$email', emp_address='$address', emp_dob='$dob', emp_phone='$phone', emp_dept='$dept', emp_status='$status'  WHERE emp_id='$emp_id'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?emp_id=".$emp_id."&message=success");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data failed, try again.</div>';
				}
			}
			
			if(isset($_GET['message']) == 'success'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully saved.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Emp_id</label>
					<div class="col-sm-3">
						<input type="text" name="emp_id" value="<?php echo $row ['emp_id']; ?>" class="form-control" placeholder="Emp_id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" value="<?php echo $row ['emp_email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-3">
						<input type="text" name="name" value="<?php echo $row ['emp_name']; ?>" class="form-control" placeholder="Name" required>
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-3">
						<textarea name="address" class="form-control" placeholder="Department"><?php echo $row ['emp_address']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dob</label>
					<div class="col-sm-3">
						<input type="date" name="dob" value="<?php echo $row ['emp_dob']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Phone</label>
					<div class="col-sm-3">
						<input type="number" name="phone" value="<?php echo $row ['emp_phone']; ?>" class="form-control" placeholder="Phone" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Department</label>
					<div class="col-sm-3">
						<select name="dept" class="form-control" required>
							<option value=""> - Lattest Department - </option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Department is :</b> <span class="label label-success"><?php echo $row['emp_dept']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-3">
						<select name="status" class="form-control" required>
							<option value="">- Lattest Status -</option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Contract">Contract</option>
							<option value="Office">Offfice</option>
						</select> 
					</div>
                    <div class="col-sm-3">
                    <b>Status is :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="label label-info"><?php echo $row['emp_status']; ?></span>
				    </div>
                </div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Update">
						<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	
</body>
</html>