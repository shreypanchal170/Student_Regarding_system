<?php session_start(); ?>
     <style type="text/css">
         	@media print {  
		@page {
			size:8.5in 14in;
			max-width:8.5in;
		}
		}
		#stud{
			width:8.5in;
			height:14in;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
			background-color:white;
		}
         </style>

          <h1 class="page-header">Student List Report      <button type="text" class="btn btn-info" onclick="printContent('stud')" >
    <i class="glyphicon glyphicon-print"></i>PRINT</button>
</h1>

            
          <div class="container">
         
          <div class="row">
          	<div class="col-sm-3">
        <div class="input-group">
    </div>
    </div>

		<br> <br>
       <div class="col-md-8" id="stud" style="padding:50px">   
       <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table>
	<tr>
		<td style="width:20%;">
		
		</td>
		<td style="width:800px;font-size:12px;line-height:1mm;text-align:center" >
		<p><b>Student Grading System</b></p>
		<p>Student List</p>
		<p><?php echo $_POST['stats'] ?> (<?php echo $_POST['sy'] ?>)</p>	
		</td>
		<td style="width:20%;">
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
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:20%">Name</th>
        <td style="width:10%">Curriculum</th>
        <td style="width:10%">Grade</th>
        <td style="width:10%">Section</th>

      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sy = $_POST['sy'];
    $stats = $_POST['stats'];
    $user = $_SESSION['ID'];
    mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
    VALUES ('printed $stats Student List of $sy','$user',NOW() )");
    $sql=  mysqli_query($conn, "SELECT * FROM student_year_info left join grade on student_year_info.YEAR=grade.grade_id WHERE SCHOOL_YEAR = '$sy' and ACTION = '$stats' ");
    while($row = mysqli_fetch_assoc($sql)) {
       $sql2=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID = '".$row['STUDENT_ID']."' ");
         while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <td><?php echo $row2['LASTNAME'] . ' ' . $row2['FIRSTNAME']. ' ' . $row2['MIDDLENAME'] ?></td>
        <td><?php echo $row2['PROGRAM'] ?></td>
        <td><?php echo $row['grade'] ?></td>
        <td><?php echo $row['SECTION'] ?></td>
      </tr>
      <?php
    }
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
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
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
