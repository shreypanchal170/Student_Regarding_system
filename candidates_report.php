     <style type="text/css">
         	@media print {  
		@page {
			size:8.5in 14in;
			max-width:8.5in;
		}
    #stud{
      position:fixed;
      top:0px;
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

          <h1 class="page-header">List of Candidates for Promotion Report      <button type="text" class="btn btn-info" onclick="printContent('stud')" >
    <i class="glyphicon glyphicon-print"></i>PRINT</button>
</h1>

            
          <div class="container">
         <span id="retcode"></span>
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
		<p>Student Candidates for Promotion List</p>
		<p> (<?php echo $_GET['school_year'] ?>)</p>	
		</td>
		<td style="width:20%;">
		
		</td>
	</tr>
</table>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:20%">Name</th>
        <td style="width:10%">Curriculum</th>
        

      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sy = $_GET['school_year'];
    $sql= mysqli_query($conn,"SELECT *,CONCAT(LASTNAME,', ',FIRSTNAME, ' ', MIDDLENAME) as name from promotion_candidates left join student_info on promotion_candidates.STUDENT_ID=student_info.STUDENT_ID   left join program on student_info.PROGRAM = program.PROGRAM_ID where SY = '$sy' order by name");
         while($row = mysqli_fetch_assoc($sql)) {
         


    ?>
      <tr>

        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['PROGRAM'] ?></td>
      <?php
    }
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
  $.ajax({
    url:'print_log.php?act=candidates&sy=<?php echo $_GET['school_year'] ?>',
    success:function(html){
      $('#retcode').html(html);
    }
  });
}
</script>
