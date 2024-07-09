<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['cur']) === 0){
		$errors['cur'] = "* Curriculum is required.";
	}
	if(preg_match("/\S+/", $_POST['des']) === 0){
		$errors['des'] = "* Description is required.";
	}
	if(count($errors) === 0){
	$cur=$_POST['cur'];
	$des=$_POST['des'];
	$user = $_SESSION['ID'];
	if(empty($_POST['id'])){
		$sql=mysqli_query($conn, "INSERT into program (PROGRAM, DESCRIPTION) VALUES ( '$cur', '$des' )");
	}else{
		$sql=mysqli_query($conn, "UPDATE program set PROGRAM='$cur', `DESCRIPTION`='$des' where PROGRAM_ID = ".$_POST['id']);
	}
	if ($sql){
		echo "<script>
		alert('New program successfully saved');
		window.location.href='rms.php?page=program';
		</script>";

	} else {
		echo "<script>
		alert('New program failed to record!" .$sql."');
		window.location.href='rms.php?page=program';
		</script>";

	}

}
}	

	mysqli_close($conn);

 ?>