<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'db.php';
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	$type = $_POST['type'];

	
	if(!empty($pwd))
		$sql = mysqli_query($conn,"UPDATE user Set FIRSTNAME = '$fname', LASTNAME = '$lname', USER= '$user', PASSWORD = '".md5($pwd)."', USER_TYPE= '$type' Where USER_ID= '$id'");
		else
	$sql = mysqli_query($conn,"UPDATE user Set FIRSTNAME = '$fname', LASTNAME = '$lname', USER= '$user' USER_TYPE= '$type' Where USER_ID= '$id'");
	if($sql){
			echo "<script>
			alert('Account updated successfully');
			 location.replace(document.referrer);
			</script>";
	
	}

}
	
	mysqli_close($conn);
?>