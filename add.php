<?php
include('connection.php');
extract($_POST);

if(isset($reg))
{

	//check user exists or not
	$que=mysqli_query($con,"select * from employee where emp_email='$eid'");
	if(mysqli_num_rows($que))
	{
	$m= "<p style='color:red'>This user already exists</p>";
	}
	else
	{
	//$pass=md5($p);
		
		
		
		$query="insert into employee values('','$eid','$name','$phone','$date','$address','$dept','$status','$p','$dob')";
		if(mysqli_query($con,$query))
		{
		$m= "Data saved successfully";
		}
		else
		{
		$m= "some error";
		}
	}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script>function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}
// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";	
    }
}
// validate date of birth
function dob_validate(dob)
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";	
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  
    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";	
    }
}

</script>
   
 <style>body {
    padding-top:50px;
}
fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
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
					<li class="active"><a href="add.php">Add Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>   
	<br>
<div class="container">
	<div class="row">
        <div class="col-md-6">
            <form action="" method="post" id="fileForm" role="form">
            <fieldset><legend class="text-center"><span style="color:#CC0000">Add New Employee Data</span></legend>
			
			
						<div class="form-group">
              		  <label for="email"><span class="req">* </span> Email Address: </label> 
                    	<input class="form-control" required type="text" name="eid" id = "email"  onchange="email_validate(this.value);" placeholder="Enter email"/>   
                        <div class="status" id="status"></div>
            </div>

			
			<div class="form-group"> 	 
                <label for="firstname"><span class="req">* </span> Employee Name: </label>
                    <input class="form-control" type="text" name="name" id = "txt" onkeyup = "Validate(this)" placeholder="Enter name" required /> 
                        <div id="errFirst"></div>    
            </div>

            <div class="form-group">
            <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                    <input required type="text" name="phone" id="phone" class="form-control phone" maxlength="28" onKeyUp="validatephone(this);" placeholder="Enter mobile no."/> 
            </div>

			<div class="form-group">
						<label for="phonenumber"><span class="req">* </span> Date Of Birth: </label>
								<input required type="date" name="date" class="form-control" placeholder="0000-00-00"/> 
						</div>
						
						<div class="form-group"> 	 
                <label for="address"><span class="req">* </span> Address: </label>
					<textarea name="address" class="form-control" placeholder="Enter address"></textarea>
                    
                        <div id="errFirst"></div>    
            </div>

			<div class="form-group">
					<label for="department"><span class="req">* </span> Depatment: </label>
					
						<select name="dept" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
						</select>
					
				</div>
				
				<div class="form-group">
					<label for="status"><span class="req">* </span> Status: </label>
					
						<select name="status" class="form-control">
							<option value=""> ----- </option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Contract">Contract</option>
							<option value="Office">Office</option>
						</select>
					</div>
           

          <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="p" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" placeholder="Enter password"/> </p>
					</div>
			<div class="form-group">
                <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again password to validate"  id="pass2" onKeyUp="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>
	
						<div class="form-group">
						<label for="join_date"><span class="req">* </span> Join Date: </label>
								<input required type="date" name="dob" class="form-control" placeholder="0000-00-00"/> 
						</div>
            
               
                <hr>
<div>
                <input type="checkbox" required name="terms" onChange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">  <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" name="reg" value="Register">
            </div>
                      

            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->
   
            <div class="col-md-6">
                <h1 class="page-header">HMS =|= </h1>
				<?php 
 if(isset($m))
 {
 ?>
 <p style="background-color:#99FFCC"><?php echo $m; ?></p>

 </tr>
 <?php
  }
 ?>
				
				
                
            </div>

	</div>
</div>

</body>
</html>
