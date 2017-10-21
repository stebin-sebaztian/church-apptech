<?php
	include_once("../temp/header.php");
	include_once("menu.php");

?>
<html>
	<head>
	</head>
	
	
	<body>
		
		<div id="mycontent">	
		
		
			
		<?php
		$msg="";
	if(isset( $_POST['un'])){
		$usr = $_POST['un'];
		$pwd = $_POST['pass'];
		$sql = "select status,role from clogin where username='$usr' and password='$pwd'";
		$tbl = getDatas($sql);
		$msg = mysqli_connect_error();
		if($msg==""){
			if(count($tbl)>0){
				if($tbl[0][0]==1){
					$_SESSION['username'] = $usr;
					nextPage($tbl[0][1]);
				}else if($tbl[0][0]==2){
					$msg = "rejected";
				}else{
					$msg = "waiting for approval";
				}
			}else{
				$msg = "Invalid login !!!";
			}
		}
	}
?>
		
			<form method="post">

				<h1 align="center">LOGIN</h1>
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" name="un"/></td>
					</tr>
					
					<tr>
						<td>Password</td>
						<td><input type="password" name="pass"/></td>
					</tr>
					
					<tr>
						
						<td colspan="2" align="center"><a href="registration.php">Sign Up ?</a></td>
				</tr>
				
				<tr>
					
					<td colspan="2" align="center"><input type="submit" value="Login"name="l"></td>
				</tr>
				<span><?php echo "$msg"; ?></span>
				</table>
			</form>
		</div>
	</body>
	
</html>
<?php
	include_once("../temp/footer.php");
?>