<?php
	function getDBConnection(){
		 return mysqli_connect("127.0.0.1","root","","aptitude_test");
	}
	//mysqli_select_db($var_conn,"bakery");
	
	function setDatas($sql){
		$var_conn=getDBConnection();
		if(!$var_conn)
			die("Connection Object Not Created".mysqli_error($var_conn));
		if(mysqli_connect_errno())
			die("Connect Failed ".mysqli_connect_errno()." : ".mysqli_connect_error());
		mysqli_query($var_conn,$sql);
	}
	
	function getDatas($sql){
		$var_conn=getDBConnection();
		if(!$var_conn)
			die("Connection Object Not Created".mysqli_error($var_conn));
		if(mysqli_connect_errno())
			die("Connect Failed ".mysqli_connect_errno()." : ".mysqli_connect_error());
		$dt = mysqli_query($var_conn,$sql);
		$table = array();
		$rno = mysqli_num_rows($dt);
		$cno = mysqli_num_fields($dt);
		for($i=0;$i<$rno;$i++){
			$row = mysqli_fetch_array($dt);
			for($j=0;$j<$cno;$j++){
				$table[$i][$j] = $row[$j];
			}
		}
		return $table;
	}
	
	function nextPage($path){
		echo "<script> parent.location.href='../",$path,"'; </script>";
	}
	
	function msgbox($msg){
		//$msg = str_replace("'","-",$msg);
		echo "<script> alert('$msg'); </script>";
		echo "<script> parent.location.href='index.php'; </script>";
	}
	
?>