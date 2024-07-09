<?php
session_start();
if(session_destroy())
{
	include 'db.php';
	mysqli_query($conn,"INSERT INTO history_log (transaction,user_id,date_added)VALUES('logged out','".$_SESSION['ID']."',NOW()) ");
header("Location: login.php");
}
?>