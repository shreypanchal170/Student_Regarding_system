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
$dc = $_POST['dc'];
$pp = $_POST['pp'];
$Tdc = $_POST['Tdc'];
$Tp = $_POST['Tp'];
$att_id = $_POST['att_id'];
$att_d = $_POST['att_d'];
$syi_id = $_POST['syi'];
$tg_id = $_POST['tg_id'];
$stats = $_POST['stats'];
$user= $_SESSION["ID"];

if(isset($_POST['sub']	)){
$sub = $_POST['sub'];
$one = $_POST['una'];
$two = $_POST['duwa'];
$three = $_POST['tatlo'];
$four = $_POST['apat'];
$fin = $_POST['fin'];
$unit = $_POST['unit'];
$act = $_POST['act'];

$subc= count($sub);
		

			for($q=0;$q < $subc;$q++){
				if($act[$q] == ""){

				}else{
				mysqli_query($conn,"INSERT INTO total_grades_subjects (STUDENT_ID, SYI_ID, SUBJECT, 1ST_GRADING, 2ND_GRADING, 3RD_GRADING, 4TH_GRADING, UNITS, FINAL_GRADES, PASSED_FAILED)
				VALUES('$id', '$syi_id', '$sub[$q]', '$one[$q]', '$two[$q]', '$three[$q]', '$four[$q]', '$unit[$q]', '$fin[$q]', '$act[$q]')");
			} 
		}
			}


			$query = mysqli_query($conn,"SELECT * FROM student_info Where STUDENT_ID = '$id' ");
			$row = mysqli_fetch_assoc['$query'];
			$student = $row['FIRSTNAME'] . ' ' . $row['LASTNAME'];
			mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $student academic record','$user',NOW() )");



			
			$sc= count($tg_id);


			for($w=0;$w < $sc;$w++){
				
				mysqli_query($conn,"UPDATE total_grades_subjects set  SUBJECT='$subject[$w]', 1ST_GRADING ='$una[$w]', 2ND_GRADING='$ikaduwa[$w]', 3RD_GRADING ='$ikatlo[$w]', 4TH_GRADING='$ikaapat[$w]', UNITS='$u[$w]', FINAL_GRADES='$f[$w]', PASSED_FAILED ='$a[$w]' where TGS_ID = '$tg_id[$w]' ");
			}
			
		

		$mc = count($att_id);

		for($i=0 ; $i < $mc; $i++)
		{
			
			mysqli_query($conn,"UPDATE  attendance set DAYS_OF_CLASSES ='$dc[$i]' where ATT_ID= '$att_id[$i]' ") ;
				
		}

		$mc2 = count($att_d);

		for($z=0 ; $z < $mc2; $z++)
		{
			
			mysqli_query($conn,"UPDATE  attendance set DAYS_PRESENT ='$pp[$z]' where ATT_ID= '$att_d[$z]' ") ;
				
		}

		$gen= mysqli_query($conn,"SELECT *, SUM(FINAL_GRADES) as fin_gra,count(TGS_ID) as gra_count from total_grades_subjects where SYI_ID='$syi_id' ");
		$fgen=mysqli_fetch_assoc($gen);
		$ga = $fgen['fin_gra'] / $fgen['gra_count'];


		$sql= mysqli_query($conn,"UPDATE student_year_info set SCHOOL='$school', SECTION ='$sec', TOTAL_NO_OF_YEAR ='$tny',SCHOOL_YEAR ='$sy', ADVANCE_UNIT = '$au', LACK_UNIT= '$lu', ADVISER='$adv',GEN_AVE= '$ga',RANK='$rank',TO_BE_CLASSIFIED= '$tbca',TDAYS_OF_CLASSES='$Tdc',TDAYS_PRESENT='$Tp',ACTION='$stats' where SYI_ID='$syi_id' ");


		header("location:".$_SERVER['HTTP_REFERER']); 
			 
			
			

		
		mysqli_close($conn);
?>