

          <div class="container">
          <div class="row">
          	
<table>
	<tr>
		<td style="width:20%;">
			<p style="align:center;text-align:center;"><img src="images/logo.jpg" style="height:50px;width:50px;" alt=""></p>
			<br><br>
		</td>
		<td style="width:800px;font-size:12px;line-height:1mm;text-align:center" >
		<p>Republic of the Philippines</p>
		<p>Department of Education</p>
		<p>NEGROS ISLAND REGION</p>
		<p>Division of Silay City</p>
		<p><b>DOÑA MONTSERRAT LOPEZ MEMORIAL HIGH SCHOOL</b></p>
		<p>Silay City</p>	
		</td>
		<td style="width:20%;">
			<p style="align:center;text-align:center;"><img src="images/deped.png" style="height:50px;width:50px;" alt=""></p>
			<br>
			<?php
			include 'db.php';
			$id = $_GET['id'];
			$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
			while($row = mysqli_fetch_assoc($sql)){
			?>
			<label style="font-size:13px">LRN#:</label>
			<label style="font-size:13px" for=""><?php echo $row['LRN_NO'] ?></label>
			<?php 
			} ?>
		</td>
	</tr>
</table>

		  </div>
		  <div class="row">
		  <div class="col-md-12">
		  <center><p><b><h4>SECONDARY STUDENT'S PERMANENT RECORDS</h4></b></p></center>
		  </div>
          </div>
          <div class="row">
		  <div class="col-md-12">

		  <table style="line-height:5mm">
		<?php 
		include 'db.php';
		$id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$mid = $row['MIDDLENAME'];
		?>
			<tr>
				<td style="width:600px;font-size:12px">
					<label for="">Name:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:17px;text-transform: uppercase;"><?php echo $row['LASTNAME'].", " .  $row['FIRSTNAME']. " " .  substr("$mid",0,1) . "."; ?></b>
					<br>
					<label for="">Place of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:15px"><?php echo $row['BIRTH_PLACE'] ?></h>
					
				</td>
				<td style="width:600px;font-size:12px">
				<label for="">Date of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:15px"><?php echo $row['DATE_OF_BIRTH'] ?></h>
					<br>
					<label for="">Town / City:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:15px"><?php echo $row['ADDRESS'] ?></h>
				</td>
				
			</tr>

			
			</table> 
			<table>
			<td style="width:600px;font-size:12px">
				
					<label for="">Parent or Guardian:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:15px;text-transform: capitalize"><?php echo $row['PARENT_GUARDIAN'] ?></h>
				</td>
			</tr>

			<tr>
			<td style="font-size:12px">

				
					<label for="">Address of Parent or Guardian:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:15px;text-transform: capitalize"><?php echo $row['P_ADDRESS'] ?></h>
				
			</td>
			
			</table> 
			<table>
			<tr>

			<td style="width:800px;font-size:12px">

				
					<label for="">Intermediate Course Completed at:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['INT_COURSE_COMP'] ?></h>
				
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">Year:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['SCHOOL_YEAR'] ?></h>
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">Ave:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['GEN_AVE'] ?></h>
			</td>
			
			
			</tr>
		</table>
		<?php } ?>
		  </div>
          </div>
          <div class="row">
          <div class="col-md-12">
          <hr style="border-color:black"></hr>
          </div>
          
          </div>
          <div class="row" >
          <div class="col-md-12">

          <p style="column-count:2">
          <?php
		$sql1 = mysqli_query($conn,"SELECT * FROM student_year_info where STUDENT_ID = '$id'");
		$num1 = mysqli_num_rows($sql1);
		while($row1 = mysqli_fetch_assoc($sql1)){
		?>
		<table style="float:left;margin-left:60px;margin-bottom:20px;border-bottom:1px solid black">
		<tr>
		<td>  
		<table>
			<tr style="width:100%">
			<td>
         
			<label style="font-size:12px">School:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			</td>
			<td style="border-bottom:1px solid black;width:400px">
		<label style="font-size:12px"><?php echo $row1['SCHOOL'] ?> </label>
		</td>
		</tr>
		</table>
	
					
					
		<table>
		<tr style="width:100%">
		<td  style="width:220px">
		<label style="font-size:12px">Yr.& Sec:&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo $row1['YEAR'] . '-' . $row1['SECTION']  ?></label>
		</td>
		<td >
		<label style="font-size:12px">Sch.Yr.:&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo $row1['SCHOOL_YEAR']?>
						
					</label>
		</td>
		</tr>
		</table>
		
		
		<table style="border-collapse:collapse">
		<tr>
		<td style="width:200px;border:1px solid black;font-size:12px;"><center><b>Subjects</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>Final Rating</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>Units Earned</b></center></td>
		<td style="width:150px;border:1px solid black;font-size:12px;"><center><b>Action<br>Taken</b></center></td>
		</tr>
		<?php
		$syi = $row1['SYI_ID'];
		$sql2 = mysqli_query($conn,"SELECT * FROM total_grades_subjects where SYI_ID = '$syi' order by SUBJECT");
		$num4 = mysqli_num_rows($sql2);
		while($row2 = mysqli_fetch_assoc($sql2)){
			$sub = $row2['SUBJECT'];
		$sql3 = mysqli_query($conn,"SELECT * FROM subjects where SUBJECT_ID = '$sub'");
		while($row3 = mysqli_fetch_assoc($sql3)){

		?>
		<tr>
		<td style="width:150px;border:1px solid black;font-size:10px;height:15px">
			<?php
           if($row3['SUBJECT'] == "     *Music"){
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];}
            elseif($row3['SUBJECT'] == "     *Arts"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }
            elseif($row3['SUBJECT'] == "     *Physical Education"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }
            elseif($row3['SUBJECT'] == "     *Health"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }	
            else{
              echo $row3['SUBJECT'];

            }
            ?>
		</td>
		<td style="width:60px;border:1px solid black;font-size:10px;height:15px;text-align:center"><?php echo $row2['FINAL_GRADES'] ?></td>
		<td style="width:60px;border:1px solid black;font-size:10px;height:15px"><?php echo $row2['UNITS'] ?></td>
		<td style="width:83px;border:1px solid black;font-size:10px;height:15px"><center><?php echo $row2['PASSED_FAILED'] ?></center></td>
		</tr>
		<?php
	}
			
	}	
			for($q = $num4; $q < 15 ; $q++){
		 ?>
		
		<tr>
		<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"></td>
		</tr>
		<?php
	

}
	
		?>
		</table>
		</td>
		</tr>

		</table>


		
         
          
          <?php
	}
	?>
	<?php
	for($c =  0;$num1 % 2 != $c; $c++){
		?>
		<table style="float:left;margin-left:60px;margin-bottom:20px;border-bottom:1px solid black">
		<tr>
		<td>
		<table>
			<tr style="width:100%">
			<td>
			<label style="font-size:12px">School:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			</td>
			<td style="border-bottom:1px solid black;width:400px">
		<label style="font-size:12px"></label>
		</td>
		</tr>
		</table>
	
					
					
		<table>
		<tr style="width:100%">
		<td  style="width:220px">
		<label style="font-size:12px">Yr.& Sec:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		</td>
		<td >
		<label style="font-size:12px">Sch.Yr.:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		</td>
		</tr>
		</table>
		<table style="border-collapse:collapse">
		<tr>
		<td style="width:200px;border:1px solid black;font-size:12px;"><center><b>Subjects</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>Final Rating</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>Units Earned</b></center></td>
		<td style="width:150px;border:1px solid black;font-size:12px;"><center><b>Action<br>Taken</b></center></td>
		</tr>
		<?php
		
		for($p = 0 ; $p < 7 ; $p++){
		 ?>
		
		<tr>
		<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"></td>
		</tr>
		<?php 
	}
		?>
		<tr>
		<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;height:15px;font-size:12px;text-align:right"><b>**</b></td>
		<td style="width:60px;height:15px;font-size:12px;text-align:right"><b>***&nbsp no &nbsp</b></td>
		<td style="width:83px;border-right:1px solid black;font-size:12px;height:15px;text-align:left"><b>entry &nbsp *****</b></td>
		</tr>

		<?php
		for($s = 0 ; $s < 7 ; $s++){
		 ?>
		
		<tr>
		<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"></td>
		</tr>
		<?php 
		}
	

		?>
		</table>
		</td>
		</tr>

		</table>

		<?php 
		}
	

		?>
      	<p>
      	</div>
          </div>
          </div>

    <script>
function Search() {
  var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("Search");
    filter = input.value.toUpperCase();
    table = document.getElementById("students");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
             if (tr[i].id != 'heads'){tr[i].style.display = "none";}
        }
    }
}
</script>


