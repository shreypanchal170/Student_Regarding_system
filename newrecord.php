 	<?php

include 'db.php';

$id = $_POST['id'];
$school = $_POST['school'];
$yr = $_POST['yr'];
$sec = $_POST['sec'];
$tny = $_POST['tny'];
$sy = $_POST['sy'];
$au = $_POST['au'];
$lu = $_POST['lu'];
$adv= $_POST['adviser'];
$tbca = $_POST['class'];
$rank = $_POST['rank'];
$subject = $_POST['subj'];
$una = $_POST['1st'];
$ikaduwa = $_POST['2nd'];
$ikatlo = $_POST['3rd'];
$ikaapat = $_POST['4th'];
$u = $_POST['units'];
$f = $_POST['final'];
$a = $_POST['action'];
$month = $_POST['month'];
$dc = $_POST['dc'];
$p = $_POST['p'];
$Tdc = $_POST['Tdc'];
$Tp = $_POST['Tp'];
$user = $_SESSION['ID'];

$search_qry = mysqli_query($conn, "SELECT * from student_year_info left join student_info on student_year_info.STUDENT_ID = student_info.STUDENT_ID WHERE STUDENT_ID = '$id' AND YEAR ='$yr' ");
$row = mysqli_query['search_qry'];
$student = $row['FIRSTNAME'] .' '. $row['LASTNAME'];
$num_row = mysqli_num_rows($search_qry);
		if($num_row >= 1){
			echo "<script>
			alert('Student Year Record is already Exist!');
			 location.replace(document.referrer);
			</script>";
			
		}else{

		$sql= mysqli_query($conn,"INSERT INTO student_year_info
			 (STUDENT_ID, SCHOOL, YEAR, SECTION, TOTAL_NO_OF_YEAR, SCHOOL_YEAR, ADVANCE_UNIT, LACK_UNIT, ADVISER,  RANK, TO_BE_CLASSIFIED, TDAYS_OF_CLASSES, TDAYS_PRESENT,ACTION)
			 VALUES('$id','$school', '$yr', '$sec', '$tny', '$sy', '$au', '$lu', '$adv',  '$rank', '$tbca', '$Tdc', '$Tp','Promoted' ) ");
			$last_id = mysqli_insert_id($conn);
			$sc= count($subject);
			mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added record of $student','$user',NOW() )");


			for($w=0;$w < $sc;$w++){
				if($subject[$w] != ''){
				mysqli_query($conn,"INSERT INTO total_grades_subjects (STUDENT_ID, SYI_ID, SUBJECT, 1ST_GRADING, 2ND_GRADING, 3RD_GRADING, 4TH_GRADING, UNITS, FINAL_GRADES, PASSED_FAILED)
				VALUES('$id', '$last_id', '$subject[$w]', '$una[$w]', '$ikaduwa[$w]', '$ikatlo[$w]', '$ikaapat[$w]', '$u[$w]', '$f[$w]', '$a[$w]')");
			}
			}
			
		

		$mc = count($month);

		for($i=0 ; $i < $mc; $i++)
		{
			mysqli_multi_query($conn,"INSERT INTO attendance (STUDENT_ID, SYI_ID, MONTH, DAYS_OF_CLASSES, DAYS_PRESENT)
				VALUES('$id', '$last_id', '$month[$i]', '$dc[$i]', '$p[$i]')");
		}

		$query = mysqli_query($conn,"SELECT *,COUNT(TGS_ID) as tg_count, SUM(FINAL_GRADES)as fin_grade FROM total_grades_subjects WHERE SYI_ID = '$last_id' ");
		while($row=mysqli_fetch_assoc($query)){
			$ga = $row['fin_grade'] / $row['tg_count'];
			mysqli_query($conn,"UPDATE student_year_info SET GEN_AVE = '$ga' WHERE SYI_ID = '".$row['SYI_ID']."' ");
		}

		$query2 = mysqli_query($conn,"SELECT * FROM total_grades_subjects WHERE SYI_ID = '$last_id' AND PASSED_FAILED='FAILED' ");
		while($row2=mysqli_fetch_assoc($query2)){
			
			$counts =  mysqli_num_rows($query2);
			$query3 = mysqli_query($conn,"SELECT * FROM grade WHERE grade_id = '$yr'");
			$row3=mysqli_fetch_assoc($query3);
			$tbca2 = $row3['grade'];
			
			if($counts > 2){
			mysqli_query($conn,"UPDATE student_year_info SET ACTION = 'Retained',TO_BE_CLASSIFIED='$tbca2' WHERE SYI_ID = '".$row2['SYI_ID']."' "); 
			}
			else{
			mysqli_query($conn,"UPDATE student_year_info SET ACTION = 'Conditional(Promoted)',TO_BE_CLASSIFIED='$tbca2' WHERE SYI_ID = '".$row2['SYI_ID']."' "); 
			}
		}
			 
			
			header('location:rms.php?page=record&id='.$id);

		}
		mysqli_close($conn);
?>