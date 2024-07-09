<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'db.php';
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	$type = $_POST['type'];
	$current = $_POST['admin'];

	$query = mysqli_query($conn,"SELECT * FROM user WHERE USER_ID = '$id'");
	$row = mysqli_fetch_assoc($query);
	if($current == $row['PASSWORD'] ){

		$sql = mysqli_query($conn,"UPDATE user Set FIRSTNAME = '$fname', LASTNAME = '$lname', USER= '$user', PASSWORD = '$pwd', USER_TYPE= '$type' Where USER_ID= '$id'");
			echo "<script>
			alert('Account updated successfully');
			 location.replace(document.referrer);
			</script>";
	}
	

}
	
	mysqli_close($conn);
?>