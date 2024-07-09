<?php 
	if($_POST['grade'] && $_POST['sec'] && $_POST['sy']){
		include 'db.php';

		$grade = $_POST['grade'];
		$sec = $_POST['sec'];
		$sy = $_POST['sy'];
		$query = mysqli_query($conn,"SELECT * FROM advisers where grade_id ='$grade' AND section='$sec' AND school_year = '$sy' ");
		$count = mysqli_num_rows($query);
		if($count < 1){ ?>
			<div class="row">
       <label class="col-md-2 te" for="adviser">Adviser</label>
       <div class="col-md-6">
         <select type="text" name="adviser" class="form-control" id ="adviser" required readonly>
         <option ></option?
         </select>
       </div>
       </div>
		<?php
		}else{
		while($row = mysqli_fetch_assoc($query)){

		?>
		 <div class="row">
       <label class="col-md-2 te" for="adviser">Adviser</label>
       <div class="col-md-6">
         <select type="text" name="adviser" class="form-control" id ="adviser" required readonly>
         <option value="<?php echo $row['adviser_id'] ?>" ><?php echo $row['name'] ?> </option?
         </select>
       </div>
       </div>
		<?php
		}
	}
	}
 ?>