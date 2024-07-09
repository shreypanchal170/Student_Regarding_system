 
 <script>
  jQuery(document).ready(function(){
    $('#messsage').hide(); 
    
  });  
        </script>
  <div class="row">
    <div class="col-md-1 text-right">
      <a type="button" class="btn btn-info" href="rms.php?page=Students" ><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <?php include 'update_student.php'; ?>
    </div>
    <div class="col-md-4">
    </div>
    </div>

    

    <?php
    include 'db.php';
    $id = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * From student_info left join program on student_info.PROGRAM=program.PROGRAM_ID where STUDENT_ID = '$id' ");
    while($row = mysqli_fetch_assoc($sql)){
     ?>
     <div class="container">
         <div class="col-md-12">
         <form method="post"">
         <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"

         <div class="row">
         <div class="col-md-2 text-right">
         <label></label>
         </div>
         <div class="col-md-2 text-center">
         
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>LRN:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" maxlength="12" class="form-control input-xs"  name="lrn" value="<?php echo $row['LRN_NO'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Name:</label>
         </div>
         <div class="col-md-2 text-center">
         <input type="text" class="form-control input-xs"  name="lname" value="<?php echo $row['LASTNAME'] ?>"
         <br>
          <label style="font-size:10px">(Last name)</label>
            
          </div>
          <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="fname" value="<?php echo $row['FIRSTNAME'] ?>"
          <br>
          <label style="font-size:10px">(First name)</label>
            
          </div>
          <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="mname" value="<?php echo $row['MIDDLENAME'] ?>"
          <br>
          <label style="font-size:10px">(Middle name)</label>
            
          </div>

        </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Gender:</label>
         </div>
         <div class="col-md-2 text-center">
          <select type="text" class="form-control input-xs"  name="gender">
          <option><?php echo $row['GENDER'] ?></option>
          <?php if($row['GENDER']=='MALE'){
              echo '<option>FEMALE</option>';

          }
          else{
             echo '<option>MALE</option>';
          }?>
          </select>
      
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-2 text-right">
         <label>Date of Birth:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="date" class="form-control input-xs"  name="dob" value="<?php echo $row['DATE_OF_BIRTH'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Place of Birth:</label>
         </div>
         <div class="col-md-4 text-center">
         <input type="text" class="form-control input-xs"  name="bp" value="<?php echo $row['BIRTH_PLACE'] ?>"
          <br>
          <label></label>
            
          </div>

         
        

        </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Address:</label>
         </div>
         <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs"  name="address" ><?php echo $row['ADDRESS'] ?></textarea>
          
          <label></label>
            
          </div>

         </div>


        <div class="row">
         <div class="col-md-2 text-right">
         <label>Parent or Guardian:</label>
         </div>
         <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs"  name="pg"><?php echo $row['PARENT_GUARDIAN'] ?></textarea>
          
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Parent or Guardian Address:</label>
         </div>
         <div class="col-md-4 text-center">
          <input type="text" class="form-control input-xs"  name="pga" value="<?php echo $row['P_ADDRESS'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-2 text-right">
         <label>Intermediate Course Completed:</label>
         </div>
         <div class="col-md-4 text-center">
          <textarea type="text" class="form-control input-xs"  name="icc" ><?php echo $row['INT_COURSE_COMP'] ?></textarea>
          
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>Total no. of years:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="number" class="form-control input-xs"  name="tny" value="<?php echo $row['TOTAL_NO_OF_YEARS'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>School Year:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="sy" value="<?php echo $row['SCHOOL_YEAR'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>General Average:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="number" class="form-control input-xs"  name="ave" value="<?php echo $row['GEN_AVE'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Curriculum Enrolled:</label>
         </div>
         <div class="col-md-2 text-center">
         <select id="prog" name="prog" class="form-control input-xs" required="">
        <option value="<?php echo $row['PROGRAM_ID'] ?>"><?php echo $row['PROGRAM'] ?></option>
    <?php
    include 'db.php';
    $sql1 = mysqli_query($conn,"SELECT * from program where PROGRAM_ID != '".$row['PROGRAM_ID']."' Order by PROGRAM ASC");
    while($row1=mysqli_fetch_assoc($sql1)){
    ?>
      <option value="<?php echo $row1['PROGRAM_ID'] ?>"><?php echo $row1['PROGRAM'] ?></option>
      <?php
    }
      ?>
    </select>          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-8 text-right">
          <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update</button>
          
          </div>

         </div>
        </form>
          
          </div> 
        </div>

    <?php
    } mysqli_close($conn);
     ?>

</div>
</div>
</div> 
</div> 


   
