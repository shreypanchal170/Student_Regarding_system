<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$errmsg_arr = array();
	$errflag = false;
	
	include('db.php');
	$user = $_POST['user'];
	$pwd = md5($_POST['pwd']);
	
	$qry="SELECT * FROM user WHERE USER = '$user' AND PASSWORD = '$pwd'";
	$result=mysqli_query($conn, $qry);
	if($result) {
		if(mysqli_num_rows($result) > 0) {

			//Login Successful
			session_regenerate_id();
			$use = mysqli_fetch_assoc($result);
			
			
			$_SESSION['ID'] = $use['USER_ID'];
			$_SESSION['fname'] = $use['FIRSTNAME'];
			$id =$use['USER_ID'];
			mysqli_query($conn,"INSERT INTO history_log (transaction,user_id,date_added)VALUES('logged in','$id',NOW()) ");

			header("location: rms.php?page=home");
			exit();
		}else {
			
			echo "<div class='erlert'><center><h4>" . "Incorrect USER or PASSWORD." . "</h4></center></div>";

			exit();
		}
	}else {
		die("Query failed");
	}
}
?>