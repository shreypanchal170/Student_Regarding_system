
 <?php
 if($_POST['id'] && $_POST['request'])
 {
  ?>

   
    <div class="col-md-12">

   <?php
    include 'db.php';
    $req=$_POST['request'];
    $id = $_POST['id'];
    $sql=  mysqli_query($conn, "SELECT * FROM student_year_info left join grade on student_year_info.YEAR = grade.grade_id left join advisers on student_year_info.ADVISER=advisers.adviser_id where STUDENT_ID = '$id' and YEAR = '$req' ");
    $NUM= mysqli_num_rows($sql);
    if($NUM > 0){
    while($row = mysqli_fetch_assoc($sql)) {
      $syi= $row['SYI_ID'];
        $sql1=  mysqli_query($conn, "SELECT * FROM student_info LEFT JOIN program ON student_info.PROGRAM=program.PROGRAM_ID where STUDENT_ID = '$id' ");
    while($row1 = mysqli_fetch_assoc($sql1)) {


    ?>
    <?php
    include 'addrow_grades.php';
    ?>
    <form method="POST" action="uprec.php">
    <input type="hidden" name="syi" value="<?php echo $row["SYI_ID"] ?>" >
    <input type="hidden" name="id" value="<?php echo $row1['STUDENT_ID'] ?>" >
      <label style="font-size:6" for="">School</label>
        <input type="text" name="school" style="width:450px;text-align:center" value="<?php echo $row["SCHOOL"] ?>" >

      <label style="font-size:6" for="">Grade</label>
        <input type="text" style="width:50px;text-align:center" value="<?php echo $row1['PROGRAM']  ?>"  disabled>
        <select type="text" name="yr" style="width:100px;text-align:center;border:0px solid white;border-bottom:1px solid black" > 
        <option value="<?php echo $row["grade_id"] ?>"><?php echo $row["grade"] ?></option>
        </select>     

      <label style="font-size:6" for="">Section</label>
        <input type="text" name="sec" style="width:100px;text-align:center" value="<?php echo $row["SECTION"] ?>" >  
        <br>

      <label style="font-size:6" for="">Total number of years in school to date</label>
        <input type="text" name="tny" style="width:290px;text-align:center" value="<?php echo $row["TOTAL_NO_OF_YEAR"] ?>" >

      <label style="font-size:6" for="">School Year</label>
        <input type="text" name="sy" style="width:150px;text-align:center" value="<?php echo $row["SCHOOL_YEAR"] ?>" >




    
        <br><br><br>

        <div class="col-xs-9" style="width:690px">

        <div class="row"  >
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
          
            <label for="" style="font-size:15px">Passed or Failed</label>
            <br>
          </div>

            

        </div>  
         

      
        <div class="row" id="t_row" >
   <?php     $sql2=  mysqli_query($conn, "SELECT * FROM total_grades_subjects where SYI_ID = '$syi' order by SUBJECT ");
    while($row2 = mysqli_fetch_assoc($sql2)){
      $subj =  $row2['SUBJECT'];

         $sql3=  mysqli_query($conn, "SELECT * FROM subjects where SUBJECT_ID = '$subj' ");
    while($row3 = mysqli_fetch_assoc($sql3)){


      ?>
          <div class="col-xs-4" style="border:1px solid black;height:25px">
          <input type="hidden" name="tg_id[]" value="<?php echo $row2['TGS_ID'] ?>" >

           
            <select name="subj[]">
            <option value="<?php echo $subj ?>"> <?php echo $row3['SUBJECT'] ?> </option>
            <?php
           $sql4 = mysqli_query($conn, "SELECT * from SUBJECTS where SUBJECT_ID !='".$row2['SUBJECT']."' AND (`FOR`='All' or `FOR`='".$_GET['prog']."') ORDER BY SUBJECT_ID");
           while($row4 = mysqli_fetch_assoc($sql4)){
            ?>
            <option value="<?php echo $row4['SUBJECT_ID']?>"> <?php echo $row4['SUBJECT'] ?></option>
            <?php
          }
          ?>
              
            </select>

          </div>
          
          <div class="col-xs-4" style="border:1px solid black;width:59px;height:25px;font-size:12px;    padding-left: 5px;">
          <input type="text" style="border-bottom:0px" name="1st[]" value="<?php echo $row2['1ST_GRADING'] ?>"  onkeyup="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" onkeydown="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" class="grade<?php echo $row2['TGS_ID'] ?>">
           
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">
         <input type="text" style="border-bottom:0px" name="2nd[]" value="<?php echo $row2['2ND_GRADING'] ?>"  onkeyup="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" onkeydown="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" class="grade<?php echo $row2['TGS_ID'] ?>">       
          </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">
        <input type="text" style="border-bottom:0px" name="3rd[]" value="<?php echo $row2['3RD_GRADING'] ?>"  onkeyup="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" onkeydown="calculateSum2(<?php echo $row2['TGS_ID']?>)" class="grade<?php echo $row2['TGS_ID'] ?>">
         
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:54px;height:25px;font-size:12px;    padding-left: 5px;" >
        <input type="text" style="border-bottom:0px" name="4th[]" value="<?php echo $row2['4TH_GRADING'] ?>"  onkeyup="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" onkeydown="calculateSum2(<?php echo $row2['TGS_ID'] ?>)" class="grade<?php echo $row2['TGS_ID'] ?>">
        </div>    
        <div class="col-xs-1 text-center" style="font-size:12px;border:1px solid black;height:25px;padding-left:1px">
        <input type="text" style="border-bottom:0px" name="final[]" value="<?php echo $row2['FINAL_GRADES'] ?>" id="fin<?php echo $row2['TGS_ID'] ?>" readonly>
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:25px">
       <input style="border-bottom:0px" type="text" name="units[]" value="<?php echo $row2['UNITS'] ?>">
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:25px;    padding-left: 2px;text-align:center;font-size:12px;width:100px">
      <input style="border-bottom:0px" type="text" name="action[]" value="<?php echo $row2['PASSED_FAILED'] ?>" id="action<?php echo $row2['TGS_ID'] ?>">
          
        </div>

        <?php
      }
    }
    
         ?>

    <br>
    <div id="t_rows">


   </div>
    </div>
    </div> 

   
       
    <div class="col-xs-3">  
    <br><br>
  <div class="row">
     <label style="font-size:10px" for="">Has advance unit in</label>
        <input type="text" name="au" style="width:162px;text-align:center" value="<?php echo $row['ADVANCE_UNIT'] ?>" >
   </div>
   <div class="row">
   <br><br>
     <label style="font-size:10px" for="">lacks unit in</label>
        <input type="text" name="lu" style="width:200px;text-align:center" value="<?php echo $row['LACK_UNIT'] ?>" >
        <br><br>
     <label style="font-size:10px" for="">To be classified as</label>
        <input type="text" name="class" style="width:170px;text-align:center" value="<?php echo $row['TO_BE_CLASSIFIED'] ?>" >
        <br><br>
     <label style="font-size:10px" for="">Total Number of<br>years in school to date</label>
        <input type="text"  style="width:145px;text-align:center" value="<?php echo $row['TOTAL_NO_OF_YEAR'] ?>" >
        <br><br>
     <label style="font-size:10px" for="">Adviser:</label>
        <input type="text" name="adviser" style="width:220px;text-align:center" 
        value="<?php echo $row['name'] ?>" >
        <br><br>
     <label style="font-size:10px" for="">Rank:</label>
        <input type="text" name="rank" style="width:232px;text-align:center" value="<?php echo $row['RANK'] ?>" >
         <br><br>
       <label style="font-size:10px" for="stats">Action</label>
         <select style="width:232px;text-align:center; border: 0;outline: 0;background: transparent;border-bottom:1px solid black;" type="text" name="stats" id ="stats" >
         <option><?php echo $row['ACTION'] ?></option>
         <option>Promoted</option>
         <option>Conditional(Promoted)</option>
         <option>Retained</option>
         </select>
        

        <a id="new_add" class="btn btn-info"><i class="fa fa-plus"></i>Add row</a>
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
            <td style="font-size:10px;text-align:center;width:50px">
            <input  type="hidden" name="att_id[]" value="<?php echo $att['ATT_ID'] ?>" >
            <input style="border-bottom:0px;width:30px" class="dc" type="text" name="dc[]" value="<?php echo $att['DAYS_OF_CLASSES'] ?>" >
             </td>
            <?php } ?>
            
            <td style="font-size:10px;text-align:center;width:130px">
            <input id="tdc" type="text" name="Tdc" style="text-align:center;width:100px;border-bottom:0px">
           </td>
          </tr>
          <tr>
            <td style="font-size:10px;text-align:center;width:130px">Days Present</td>
            <?php
            $atten2= mysqli_query($conn, "SELECT * FROM attendance where SYI_ID = '$syi' order by ATT_ID ");
            while($att2=mysqli_fetch_assoc($atten2)){



             ?>
            <td style="font-size:10px;text-align:center;width:50px">
          
            <input  type="hidden" name="att_d[]" value="<?php echo $att2['ATT_ID'] ?>" >
              <input style="border-bottom:0px;width:30px" class="p" type="text" name="pp[]" value="<?php echo $att2['DAYS_PRESENT'] ?>" >
            </td>
           <?php } ?>
            <td style="font-size:10px;text-align:center;width:130px">
              <input type="text" id="tp" name="Tp" style="text-align:center;width:100px;border-bottom:0px" >
            </td>
          </tr>
        
      </table>

      <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>
       </div>
    </div>
 </div>
    </div>

    <br>

    



        <?php

  }  
}
}
else{
  echo "<br><br><br>";
  echo "<h3>This student does not have record in selected grade.</h3>";
}
mysqli_close($conn);
}

     ?> 
     <script>
      $(document).ready(function() {
    //this calculates values automatically 
    calculateSum();
     calculateSum2();
     calculateAVE();
     acts();


    $(".dc").on("keydown keyup", function() {
        calculateSum();
    });
    $(".p").on("keydown keyup", function() {
        calculateAVE();
    });
    $("#action").on("keydown keyup", function() {
        acts();
    });
});

function calculateSum() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".dc").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
            ;
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
 
  $("input#tdc").val(sum.toFixed(0));
}

function calculateSum2($i) {
    var sum = 0,
    i = $i;
    //iterate through each textboxes and add the values
    $(".grade"+ i).each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value)/ "4";
            ;
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
 if(sum < 75){
  $("input#action"+ i).val("FAILED");
 }else{
  $("input#action"+ i).val("PASSED");

 }
  $("input#fin"+i).val(sum);
}
function ave2($i) {
    var sum = 0,
    i = $i;
    //iterate through each textboxes and add the values
    $(".grad"+ i).each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value)/ "4";
            ;
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
 if(sum < 75){
  $("input#act"+ i).val("FAILED");
 }else{
  $("input#act"+ i).val("PASSED");

 }
  $("input#fina"+i).val(sum);
}
function calculateAVE() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $("input.p").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value) ;
            ;
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
 
  $("input#tp").val(sum.toFixed(0));
}
function acts($i){
  var i = $i;
 $("input#action"+i).each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value == 'FAILED') {
             $("input#stats").val('Retained');
        }
        else{
           $("input#stats").val('Promoted');
        }
    });
  
 }
    </script>