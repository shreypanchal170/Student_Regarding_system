<?php 
include 'db.php';
$id = $_POST['id'];
$subj = $_POST['subj'];
$para = $_POST['para'];
$desc = $_POST['desc'];
$user = $_SESSION['ID'];

$sql = "UPDATE subjects SET SUBJECT='$subj',DESCRIPTION='$desc',`FOR`='$para' WHERE SUBJECT_ID='$id'";
mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the subject list','$user',NOW() )");

if (mysqli_query($conn, $sql)) {
	header("location:".$_SERVER['HTTP_REFERER']);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

 ?>