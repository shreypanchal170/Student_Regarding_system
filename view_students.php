<div class="modal-body"> 

    <?php
    include 'db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($conn, "SELECT * From student_info left join program on student_info.PROGRAM = program.PROGRAM_ID where STUDENT_ID = '$id'");
    while($row = mysqli_fetch_assoc($sql)){
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>"
         <div class="row">
         <div class="col-md-5 text-right">
         <label>LRN:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['LRN_NO'] ?>

            
          </div>

         </div>
         <br>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Name:</label>
         </div>
         <div class="col-md-4 text-left">
         <?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?>
    
          </div>
        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Gender:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GENDER'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>Date of Birth:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['DATE_OF_BIRTH'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Place of Birth:</label>
         </div>
         <div class="col-md-2 text-left">
        <?php echo $row['BIRTH_PLACE'] ?>
            
          </div>

        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Address:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>


        <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent or Guardian:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['PARENT_GUARDIAN'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent or Guardian Address:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['P_ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>Intermediate Course Completed:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['INT_COURSE_COMP'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Total no. of years:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['TOTAL_NO_OF_YEARS'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>School Year:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['SCHOOL_YEAR'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>General Average:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GEN_AVE'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Curriculum Enrolled:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['PROGRAM'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-8 text-right">
         <!-- <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update</button> -->
          
          </div>

         </div>
         </div>
         </div>
         <div class="modal-footer">
           <a  class="btn btn-default" href="rms.php?page=student_p&id=<?php echo $id ?>">Update</a>
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       

        

    <?php
    }
    } mysqli_close($conn);
     ?>



 