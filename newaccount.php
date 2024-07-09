<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'db.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['user'];
	$pwd = md5($_POST['pwd']);
	$type = $_POST['type'];
	

		$sql = "INSERT INTO user (FIRSTNAME, LASTNAME, PASSWORD, USER, USER_TYPE)
	VALUES ('$fname', '$lname', '$pwd', '$user' ,'$type')";

	if (mysqli_query($conn, $sql)) {
    echo "<script>
	alert('New account successfully recorded!');
	locarion.href = 'rms.php?page=users'
	</script>";


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
	
	mysqli_close($conn);
?>