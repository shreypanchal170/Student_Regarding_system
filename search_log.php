<?php
include 'db.php';
$s_txt=$_GET['st'];


       		include 'db.php';
       		$query = mysqli_query($conn,"SELECT * FROM history_log left join user on history_log.user_id=user.USER_ID where user.USER LIKE ('" .$s_txt. "%') or history_log.transaction LIKE ('" .$s_txt. "%') or date_added LIKE ('" .$s_txt. "%') order by date_added DESC ");
       		while($row = mysqli_fetch_assoc($query)){
       		$date = strtotime($row['date_added']);

       		?>
       			<tr>
       				<td><i> <?php echo date("F d, Y | h:i:s G",$date) ?> </i></td>
       				<td style="color:gray"><i> <?php echo $row['USER'] .' '. $row['transaction'] . '.' ?> </i></td>
       			</tr>
       		<?php } ?>
