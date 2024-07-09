<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['grade']) === 0){
		$errors['grade'] = "* Grade is required.";
	}
	
	if(count($errors) === 0){


	$grade=$_POST['grade'];
	$user = $_SESSION['ID'];
	
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into grade (grade) 
		VALUES ( '$grade' )") && $sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $grade in the grades list','$user',NOW() )") ){
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Grade Successfully Added.</h4></center></div>";
	echo "<script>
	setTimeout(function(){	window.location.href='rms.php?page=grade';  }, 1500);</script>";
	} else {
		echo "<script>
		alert('New subject failed to record!" .$sql."');
		window.location.href='rms.php?page=grade';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$sql = "UPDATE grade SET grade='$grade' WHERE grade_id='$id'";
		$sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the grades list','$user',NOW() )");
		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Current School Year Successfully Updated.</h4></center></div>";
			echo "<script>
			setTimeout(function(){	window.location.href='rms.php?page=grade';  }, 1500);</script>";

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