<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['sy']) === 0){
		$errors['sy'] = "* School Year is required.";
	}
	
	if(count($errors) === 0){


	$sy=$_POST['sy'];
	$user = $_SESSION['ID'];
	
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into school_year (school_year, status) 
		VALUES ( '$sy', 'No' )") && $sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $sy in the school year list','$user',NOW() )") ){
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Scool Year Successfully Added.</h4></center></div>";
	echo "<script>
	setTimeout(function(){	window.location.href='rms.php?page=school_year';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('New subject failed to record!" .$sql."');
		window.location.href='rms.php?page=school_year';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$status=$_POST['status'];
		$sql = "UPDATE school_year SET school_year='$sy',status='$status' WHERE SY_ID='$id'";
		$sql2 = mysqli_query($conn,"UPDATE school_year SET status='No' WHERE SY_ID != '$id'");
		if($status == 'Yes'){
			$query = mysqli_query($conn,"SELECT * FROM school_year where SY_ID = '$id' ");
			$data = mysqli_fetch_assoc($query);
			$s_y= $data['school_year'];
		$sql3=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $s_y as the current school year ','$user',NOW() )");
	}

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Current School Year Successfully Updated.</h4></center></div>";
			echo "<script>
			setTimeout(function(){	window.location.href='rms.php?page=school_year';  }, 2000);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 3000);</script>";
}

}

	mysqli_close($conn);

 ?>