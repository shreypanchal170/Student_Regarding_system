
          <h3 class="page-header">Advisers <small>section</small></h3> 
      <?php
            include 'new_adviser.php'
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Advisers</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:20%">Name</th>
        <th style="width:10%">Advisory</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM advisers left join grade on advisers.grade_id=grade.grade_id left join program
    on advisers.program=program.PROGRAM where school_year='".$_GET['sy']."' ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["adviser_id"] ?>" name="id" value="<?php echo $row['adviser_id'] ?>">
         <input type="hidden" id="prog<?php echo $row["adviser_id"] ?>" name="id" value="<?php echo $row['PROGRAM'] ?>">
         <input type="hidden" id="gid<?php echo $row["adviser_id"] ?>" name="id" value="<?php echo $row['grade_id'] ?>">
         <input type="hidden" id="grade<?php echo $row["adviser_id"] ?>" name="id" value="<?php echo $row['grade'] ?>">
         <input type="hidden" id="sec<?php echo $row["adviser_id"] ?>" name="id" value="<?php echo $row['section'] ?>">
        <td><input id="name<?php echo $row["adviser_id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['name'] ?>" readonly></td>
        <td><input id="handle<?php echo $row["adviser_id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['program'].' '.$row['grade'].'-'.$row['section'] ?>" readonly></td>
        <td><center><a onclick="update_adviser(<?php echo $row["adviser_id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
      </tr>
    
      <?php
    
    }
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script>
  function update_adviser($i){
   var i = $i;
      $("#id").val($("#id"+i).val());
      $("#name").val($("#name"+i).val());
      $("#sec").val($("#sec"+i).val());
      $("#g_handle").val($("#gid"+i).val());
      $("#head").html('Update Adviser');
      $("#btn_add").html('Update');
      $("#p_handle").html($("#prog"+i).val());
      $("#g_handle").html($("#grade"+i).val());
  
     



  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Add New Adviser</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <input type="hidden" value="<?php echo $_GET['sy'] ?>" name="sy">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Name</label>
              <div class="cols-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control" id="name" name="name"
                  style="width:200px" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['name'])){echo "<div class='erlert' id='alert'><h5>" .$errors['name']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="prog" class="cols-sm-2 control-label">Program Handles</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name='prog' id="prog" class="form-control">
                    <option id='p_handle'></option>
                    <?php
                    include 'db.php';
                    $query = mysqli_query($conn,"SELECT * From program order by PROGRAM");
                    while($row=mysqli_fetch_assoc($query)){
                     ?>
                    <option><?php echo $row['PROGRAM'] ?></option>
                    <?php } ?>
                  </select>
                  </div>
                 <p>
            <?php if(isset($errors['prog'])){echo "<div class='erlert' id='alert'><h5>" .$errors['prog']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="grade" class="cols-sm-2 control-label">Grade</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name='grade' id="grade" class="form-control cols-sm-12">
                    <option id='g_handle'></option>
                    <?php
                    include 'db.php';
                    $query = mysqli_query($conn,"SELECT * From grade order by grade_id");
                    while($row=mysqli_fetch_assoc($query)){
                     ?>
                    <option value="<?php echo $row['grade_id'] ?>"><?php echo $row['grade'] ?></option>
                    <?php } ?>
                  </select>
                  </div>
                 <p>
            <?php if(isset($errors['grade'])){echo "<div class='erlert' id='alert'><h5>" .$errors['grade']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="sec" class="cols-sm-2 control-label">Section</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="sec" name="sec"
                  style="width:200px" value="<?php if(isset($_POST['sec'])){echo $_POST['sec'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['sec'])){echo "<div class='erlert' id='alert'><h5>" .$errors['sec']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
  

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>
 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
