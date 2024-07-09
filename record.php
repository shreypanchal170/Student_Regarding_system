

    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <script type="text/javascript">
      function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
    </script>
   <script type="text/javascript">


$(document).ready(function()
{

    $('#fetch').on('change',function()
    {
        var value = $(this).val();
        var id = getParameterByName('id');
        var val = 'id='+ encodeURIComponent(id) + '&request='+ encodeURIComponent(value);
        
        
            $.ajax({
                type:'POST',
                url:'updateRecord.php?prog=<?php echo $_GET["prog"] ?>',
                data:val, 
                beforeSend:function()
{
 $("#fetch-feild").html('Working on Please wait ..');
},
success:function(data)
{
   $("#fetch-feild").html(data);
},
                
            }); 
        
    });
    
});
</script>

    <style>
      input {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid black;
    }
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    </style>
 
    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql=  mysqli_query($conn, "SELECT * FROM student_info where STUDENT_ID = '$id' ");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>

          <h1 class="page-header"><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></h1>
          <?php
    } mysqli_close($conn);
      ?>
      <div class="col-md-5">
      <div class="form-inline">
      <div class="form-group">
      <a href="rms.php?page=record&id=<?php  echo $_GET['id']?>" class="btn btn-success"> View All</a>
      <label for="focusedInput">Select Grade:</label>
      <select class="form-control" style="height:30px;font-size:12px" id="fetch">
        <option > </option>
    <?php 
    include 'db.php';
    $query=mysqli_query($conn,"SELECT * FROM grade Order by grade_id");
    while($row=mysqli_fetch_assoc($query)){
    ?>
    <option value="<?php echo $row['grade_id'] ?>"><?php echo $row['grade'] ?> </option>
    <?php }  ?>
      </select>
    </div>
    </div>
    </div>
    <div class="col-md-7 text-right">
    <?php $query = mysqli_query($conn,"SELECT school_year FROM school_year where status='Yes'");
    while($sy = mysqli_fetch_assoc($query)){ ?>
      <a class='btn btn-success' href="rms.php?page=addrecord&id=<?php echo $_GET['id'] ?>&sy=<?php echo $sy['school_year'] ?>&prog=<?php echo $_GET['prog'] ?>"><i class="fa fa-plus"> Add Record</i></a>
      <?php
    } ?>
    </div>
    <br>
    <br>
    <input type="text" style="width:100%;text-align:center"  disabled>
    <br>
    <br>
 
 <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql=  mysqli_query($conn, "SELECT * FROM student_year_info left join grade on student_year_info.YEAR = grade.grade_id 
    left join advisers on student_year_info.ADVISER=advisers.adviser_id where STUDENT_ID = '$id' ");
    while($row = mysqli_fetch_assoc($sql)) {
      $syi= $row['SYI_ID'];
        $sql1=  mysqli_query($conn, "SELECT * FROM student_info where STUDENT_ID = '$id' ");
    while($row1 = mysqli_fetch_assoc($sql1)) {
      $sql3=  mysqli_query($conn, "SELECT * FROM program where PROGRAM_ID = '".$row1['PROGRAM']."' ");
    while($row2 = mysqli_fetch_assoc($sql3)) {


    ?>


    <div id="fetch-feild">
    <div class="col-md-12">

  
      <label style="font-size:6" for="">School</label>
        <input type="text" style="width:450px;text-align:center" value="<?php echo $row["SCHOOL"] ?>" disabled>

      <label style="font-size:6" for="">Grade</label>
        <input type="text" style="width:150px;text-align:center" value="<?php echo $row2['PROGRAM'] . ' '. $row["grade"]; ?>" disabled>      

      <label style="font-size:6" for="">Section</label>
        <input type="text" style="width:100px;text-align:center" value="<?php echo $row["SECTION"] ?>" disabled>  
        <br>

      <label style="font-size:6" for="">Total number of years in school to date</label>
        <input type="text" style="width:290px;text-align:center" value="<?php echo $row["TOTAL_NO_OF_YEAR"] ?>" disabled>

      <label style="font-size:6" for="">School Year</label>
        <input type="text" style="width:150px;text-align:center" value="<?php echo $row["SCHOOL_YEAR"] ?>" disabled>


    
        <br>
        <div class="col-xs-9" style="width:690px">

        <div class="row">
          <div class="col-xs-4 text-center" style="height:53px;border:1px solid black;padding-right:1px">
          <br>
            <label for="" style="font-size:6">Subjects</label>
            <br>
          </div>
          <div class="col-xs-4" style="height:53px;border:1px solid black;width:225px">
          
            <label for="" style="font-size:6;text-align:center;width:200px;border-bottom:1px solid black">Periodic Rating</label>
            <br>
            <label for="" style="font-size:6;width:43px;border-right:1px solid black;text-align:center">1</label>
            <label for="" style="font-size:6;width:52px;border-right:1px solid black;text-align:center">2</label>
            <label for="" style="font-size:6;width:52px;border-right:1px solid black;text-align:center">3</label>
            <label for="" style="font-size:6;width:30px;;text-align:center">4</label>
          </div>
          <div class="col-xs-1 text-center" style="height:53px;border:1px solid black">
          <br>
            <label for="" style="font-size:6">Final</label>
            <br>
          </div>
          <div class="col-xs-1 text-center" style="height:53px;border:1px solid black">
          <br>
            <label for="" style="font-size:6">Units</label>
            <br>
          </div>
          <div class="col-xs-1 text-center" style="height:53px;border:1px solid black;padding-left:1px;width:100px">
          
            <label for="" style="font-size:15px;text-align:center">Passed or Failed</label>
            <br>
          </div>

            

        </div>  

        <div class="row" >
   <?php     $sql2=  mysqli_query($conn, "SELECT * FROM total_grades_subjects where SYI_ID = '$syi' order by SUBJECT ");
    while($row2 = mysqli_fetch_assoc($sql2)){
      $subj =  $row2['SUBJECT'];

         $sql3=  mysqli_query($conn, "SELECT * FROM subjects where SUBJECT_ID = '$subj' ");
    while($row3 = mysqli_fetch_assoc($sql3)){


      ?>
          <div class="col-xs-4" style="border:1px solid black;height:20px">
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
          </div>
          
          <div class="col-xs-4" style="border:1px solid black;width:59px;height:20px;font-size:12px;    padding-left: 5px;">
           <?php echo $row2['1ST_GRADING'] ?>
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:20px;font-size:12px;    padding-left: 5px;">
         <?php echo $row2['2ND_GRADING'] ?>
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:20px;font-size:12px;    padding-left: 5px;">
         <?php echo $row2['3RD_GRADING'] ?>
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:54px;height:20px;font-size:12px;    padding-left: 5px;">
         <?php echo $row2['4TH_GRADING'] ?>
        </div>    
        <div class="col-xs-1 text-center" style="font-size:12px;border:1px solid black;height:20px;padding-left:1px">
           <?php echo $row2['FINAL_GRADES'] ?>
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:20px">
          <?php echo $row2['UNITS'] ?>
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:20px;    padding-left: 2px;text-align:center;font-size:12px;width:100px">
          <?php echo $row2['PASSED_FAILED'] ?>
        </div>

        <?php
      }
    }
    
         ?>
    

   </div>
    </div>
   
       
    <div class="col-xs-3">  
  <div class="row">
     <label style="font-size:10px" for="">Has advance unit in</label>
        <input type="text" style="width:162px;text-align:center" value="<?php echo $row['ADVANCE_UNIT'] ?>" disabled>
   </div>
   <div class="row">
   <br><br>
     <label style="font-size:10px" for="">lacks unit in</label>
        <input type="text" style="width:200px;text-align:center" value="<?php echo $row['LACK_UNIT'] ?>" disabled>
        <br><br>
     <label style="font-size:10px" for="">To be classified as</label>
        <input type="text" style="width:170px;text-align:center" value="<?php echo $row['TO_BE_CLASSIFIED'] ?>" disabled>
        <br><br>
     <label style="font-size:10px" for="">Total Number of<br>years in school to date</label>
        <input type="text" style="width:145px;text-align:center" value="<?php echo $row['TOTAL_NO_OF_YEAR'] ?>" disabled>
        <br><br>
     <label style="font-size:10px" for="">Adviser:</label>
        <input type="text" style="width:220px;text-align:center" 
        value="<?php echo $row['name'] ?>" disabled>
        <br><br>
     <label style="font-size:10px" for="">General Average:</label>
        <input type="text" style="width:175px;text-align:center" value="<?php echo $row['GEN_AVE'] ?>" disabled>
        <br><br>
     <label style="font-size:10px" for="">Rank:</label>
        <input type="text" style="width:232px;text-align:center" value="<?php echo $row['RANK'] ?>" disabled>
        <BR><BR><BR><br>
   </div>
    </div>

    <div class="col-xs-12">
      <table class="table" style="width:940px" >
       
          <tr>
            <th style="font-size:10px;text-align:center;width:130px">Months</td>
            <th style="font-size:10px;text-align:center;width:50px">Jun</td>
            <th style="font-size:10px;text-align:center;width:50px">Jul</td>
            <th style="font-size:10px;text-align:center;width:50px">Aug</td>
            <th style="font-size:10px;text-align:center;width:50px">Sept</td>
            <th style="font-size:10px;text-align:center;width:50px">Oct</td>
            <th style="font-size:10px;text-align:center;width:50px">Nov</td>
            <th style="font-size:10px;text-align:center;width:50px">Dec</td>
            <th style="font-size:10px;text-align:center;width:50px">Jan</td>
            <th style="font-size:10px;text-align:center;width:50px">Feb</td>
            <th style="font-size:10px;text-align:center;width:50px">March</td>
            <th style="font-size:10px;text-align:center;width:50px">April</td>
            <th style="font-size:10px;text-align:center;width:50px">May</td>
            <th style="font-size:10px;text-align:center;width:130px">Total</td>
          </tr>
          <tr>
            <td style="font-size:10px;text-align:center;width:130px">Days of School</td>
            <?php
            $atten= mysqli_query($conn, "SELECT * FROM attendance where SYI_ID = '$syi' order by ATT_ID ");
            while($att=mysqli_fetch_assoc($atten)){



             ?>
            <td style="font-size:10px;text-align:center;width:50px"> <?php echo $att['DAYS_OF_CLASSES'] ?></td>
            <?php } ?>
            
            <td style="font-size:10px;text-align:center;width:130px"><?php echo $row['TDAYS_OF_CLASSES'] ?> </td>
          </tr>
          <tr>
            <td style="font-size:10px;text-align:center;width:130px">Days Present</td>
            <?php
            $atten2= mysqli_query($conn, "SELECT * FROM attendance where SYI_ID = '$syi' order by ATT_ID ");
            while($att2=mysqli_fetch_assoc($atten2)){



             ?>
            <td style="font-size:10px;text-align:center;width:50px">
              <?php echo $att2['DAYS_PRESENT'] ?>
            </td>
           <?php } ?>
            <td style="font-size:10px;text-align:center;width:130px">
              <?php echo $row['TDAYS_PRESENT'] ?>
            </td>
          </tr>
        
      </table>
    </div> 
    </div>
     <br>
     <input type="text" style="width:100%;text-align:center"  disabled>
    <br>
    <br>
        <?php

  }  
}
}
mysqli_close($conn);

     ?>  


    
   
    </div>
 </div>
    </div>
   

    </div>
    </div>
    
    

