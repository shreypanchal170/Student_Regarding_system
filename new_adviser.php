<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['name']) === 0){
		$errors['name'] = "* Name is required.";
	}
	if(preg_match("/\S+/", $_POST['prog']) === 0){
		$errors['prog'] = "* Program is required.";
	}
	if(preg_match("/\S+/", $_POST['grade']) === 0){
		$errors['grade'] = "* Grade is required.";
	}
	if(preg_match("/\S+/", $_POST['sec']) === 0){
		$errors['sec'] = "* Section is required.";
	}
	
	
	if(count($errors) === 0){


	$name=$_POST['name'];
	$prog=$_POST['prog'];
	$grade=$_POST['grade'];
	$sec=$_POST['sec'];
	$sy=$_POST['sy'];
	
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into advisers (name, grade_id, section, program, school_year) 
		VALUES ( '$name', '$grade','$sec','$prog','$sy' )")){
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Adviser Successfully Added.</h4></center></div>";
	echo "<script>
	setTimeout(function(){	window.location.href='rms.php?page=advisers&sy=$sy';  }, 1500);</script>";
	} else {
		echo "<script>
		alert('New subject failed to record!" .$sql."');
		window.location.href='rms.php?page=advisers&sy=$sy';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$sql = "UPDATE advisers SET name='$name', grade_id='$grade', section='$sec', program='$prog' WHERE adviser_id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Adviser Successfully Updated.</h4></center></div>";
			echo "<script>
			setTimeout(function(){	window.location.href='rms.php?page=advisers&sy=$sy';  }, 1500);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 1500);</script>";
}

}

	mysqli_close($conn);

 ?>