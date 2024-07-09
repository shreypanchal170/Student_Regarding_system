

 <?php
    include 'db.php';
    if($_POST['id']){
      $id = $_POST['id'];
    $sql=  mysqli_query($conn, "SELECT * FROM user where USER_ID = '$id'");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>
       <div class="form-group">
        <label class="control-label col-sm-1" for="fname">Firstname:</label>
      <div class="col-sm-3">  
              <input type="hidden" class="form-control" name="id" value="<?php echo $row['USER_ID'] ?>" >
        
          <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['FIRSTNAME'] ?>" >
      </div>
    </div> 
    <br>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-1" for="lname">Lastname:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['LASTNAME'] ?>" >
      </div>
    </div>
    <br>

    <div class="form-group">
      <label class="control-label col-sm-1" for="user">User:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="user" name="user" value="<?php echo $row['USER'] ?>" >
      </div>
    </div>
    <br>    
    <div class="form-group">
      <label class="control-label col-sm-1" for="pwd">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" id="pwd" name="pwd" value="" >
      </div>
    </div>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-1" for="pwd">User Type:</label>
      <div class="col-sm-3">   
        <select class="form-control" name="type" id="sel1">
        <option><?php echo $row['USER_TYPE']?></option>
        <?php
        if($row['USER_TYPE'] == "STAFF"){ ?>
          <option value="ADMINISTRATOR">ADMINISTRATOR</option>
        <?php }else{?>
          <option value="STAFF">STAFF</option>
        <?php } ?>
        </select>
      </div>
    </div>
    <br>
   


<?php } }
mysqli_close($conn); ?>