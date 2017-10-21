




<?php
	include_once("../temp/header.php");
	include_once("menu.php");
	if(isset($_POST["fname"])){
		$fname=$_POST["fname"];
		$sname=$_POST["sname"];
		$lname=$_POST["lname"];
		$address=$_POST["address"];
		$eid=$_POST["mid"];
		$phno=$_POST['pno'];
		$uname=$_POST['un'];
		$pass=$_POST['pass'];
		
		$sql="select ifnull(max(sid),0)+1 from registration";
		$data=getDatas($sql);
		$id=$data[0][0];
		
		$sql="insert into login values('$uname','$pass',0,'student')";
		setDatas($sql);
		$msg1=mysqli_connect_error();
		
		$sql1="insert into registration values($id,'$fname','$sname','$lname','$address','$eid','$phno','$uname')";
		setDatas($sql1);
		$msg2=mysqli_connect_error();
		
		if($msg1==null||$msg2==null){
			$msg="Success";
			msgbox($msg);
		}

	}
		
?>

		<div id="mycontent">		
			<form method="post">
				<span id="error-sh"></span>
				<h1 align="center">REGISTRATION</h1>
				<table>
					
					<tr>
						<td>First Name</td>
						<td><input type="text" class="text" required="required" name="fname" placeholder="Enter FirstName"/></td>
					</tr>
					<tr>
						<td>Second Name</td>
						<td><input type="text" class="text" required="required" name="sname" placeholder="Enter secondName"/></td>
					</tr>
					
					<tr>
						<td>Last Name</td>
						<td><input type="text" class="text" required="required" name="lname" placeholder="Enter LastName"/></td>
					</tr>
					
					<tr>
						<td>Address</td>
						<td><textarea cols="21" name="address" rows="5" placeholder="Enter Address"/></textarea></td>
					</tr>
					
					<tr>
						<td>Mail ID</td>
						<td><input type="text" name="mid"placeholder="username@mail.com"/></td>
					</tr>
					
					
					<tr>
						<td>Phone no</td>
						<td><input type="text" class="phone" required="required" name="pno" placeholder="Enter phone no"/></td>
					</tr>
					
					
					
					
					<tr>
						<td>Username</td>
						<td><input type="text" name="un" placeholder="Ente username"/></td>
					</tr>
					
					<tr>
						<td>Password</td>
						<td><input type="password" class="password" required="required" minlen="8"name="pass" placeholder="enter password"></td>
					</tr>
					
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" class="cpassword" required="required" name="pass" placeholder="enter password"></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" value="Submit"name="s"></td>
					</tr>
				
				</table>
			</form>
		</div>
		
	

<?php
	include_once("../temp/footer.php");
?>