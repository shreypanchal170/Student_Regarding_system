<?php 
include 'db.php';
$id = $_POST['id'];
$sy = $_POST['sy'];
$iid = count($id);

for($i = 0; $i < $iid; $i++){
	if($id[$i] != ''){
$query =mysqli_query($conn,"DELETE FROM promotion_candidates where STUDENT_ID='$id[$i]' and SY='$sy'");
}
}
if($query){
	echo 'true';
}
?>