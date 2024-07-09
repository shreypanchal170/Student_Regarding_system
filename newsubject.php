<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['sub']) === 0){
		$errors['sub'] = "* Subject is required.";
	}
	if(preg_match("/\S+/", $_POST['des']) === 0){
		$errors['des'] = "* Description is required.";
	}
	if(count($errors) === 0){


	$sub=$_POST['sub'];
	$for=$_POST['f'];
	$des=$_POST['des'];
	$user= $_SESSION['ID'];
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into subjects (SUBJECT, DESCRIPTION, `FOR`) 
		VALUES ( '$sub', '$des', '$for' )")){
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $sub in the subject list','$user',NOW() )");
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Subject Successfully Added.</h4></center></div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=subjects';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('New subject failed to record!" .$sql."');
		window.location.href='rms.php?page=subjects';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$sql = "UPDATE subjects SET SUBJECT='$sub',DESCRIPTION='$des',`FOR`='$for' WHERE SUBJECT_ID='$id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the subject list','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Subject Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=subjects';  }, 2000);</script>";

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