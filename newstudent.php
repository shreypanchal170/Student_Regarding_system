<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){


$lrn=$_POST['lrn'];
$ln=$_POST['lname'];
$fn=$_POST['fname'];
$mn=$_POST['mname'];
$gender=$_POST['gender'];
$bp=$_POST['bp'];
$dob=$_POST['dob'];
$pob=$_POST['pob'];
$pg=$_POST['pg'];
$pga=$_POST['pg_add'];
$icc=$_POST['icc'];
$sy=$_POST['sy'];
$tny=$_POST['tny'];
$ave=$_POST['ave'];
$prog = $_POST['prog'];
$user = $_SESSION['ID'];
include 'db.php';

$search_query = mysqli_query($conn, "SELECT * FROM student_info WHERE LRN_NO = '$lrn'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			"<script>
			alert('LRN is not available.');
			 location.replace(document.referrer);
			</script>";
		}else{
			$sql = "INSERT INTO student_info
			 (
			 LRN_NO,
			 LASTNAME,
			 FIRSTNAME,
			 MIDDLENAME,
			 BIRTH_PLACE,
			 PARENT_GUARDIAN,
			 P_ADDRESS,
			 INT_COURSE_COMP,
			 SCHOOL_YEAR,
			 GEN_AVE,
			 TOTAL_NO_OF_YEARS,
			 DATE_OF_BIRTH,
			 ADDRESS,
			 GENDER,
			 PROGRAM
			   )
		VALUES (
			'$lrn',
			'$ln',
			'$fn',
			'$mn',
			'$bp',
			'$pg',
			'$pga',
			'$icc',
			'$sy',
			'$ave',
			'$tny',
			'$dob',
			'$pob',
			'$gender',
			'$prog'
		)";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $fn $ln as new student','$user',NOW() )");
		if (mysqli_query($conn, $sql)) {

			echo "<div class='erlert-success'><center><h4>" . "New Student Successfully Added." . "</h4></center></div>";

		} else {
		    "<script>
			alert('Failed to Submit.');
			</script>";
		}


		}
	
	}
mysqli_close($conn);

  ?>