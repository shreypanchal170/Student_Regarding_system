<?php 
include 'db.php';
$id = $_POST['id'];
$sy = $_POST['sy'];
$iid = count($id);

for($i = 0; $i < $iid; $i++){
	if($id[$i] != ''){
$query =mysqli_query($conn,"INSERT INTO promotion_candidates (STUDENT_ID,SY)VALUES('$id[$i]','$sy')");
}
}
if($query){
	echo 'true';
}
?>