
          <h1 class="page-header">Promote Students </h1>


       <div class="col-md-12"> 
       <div class="row">
      <div class="alert alert-success" id="correct"> Student is now a Candidate of Promotion!</div>
        </div>   
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>
        </div> 
        <div class="panel-body"> 

      <form id="promote" method="POST" >
  <table id="students" class="table table-bordered">
  <center> <button class="btn btn-info" type="submit">Promote</button></center>
        <input type="hidden" name="sy" id="sy" value="<?php echo $_GET['sy'] ?>">
    <thead>
      <tr id="heads">
       
       
        <th style="width:10%">LRN NO.</th>
        <th style="width:20%">Name</th>
        <th style="width:10%">Gender</th>
        <th style="width:10%">Curriculum</th>
        <th style="width:10%"><center><label><input type="checkbox" id="selectall">Select All</label></center></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    $sql=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID Not IN (SELECT STUDENT_ID FROM promotion_candidates) ");
    while($row = mysqli_fetch_assoc($sql)) {
      


    ?>
      <tr>
        
        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        <td><?php echo $row['GENDER'] ?></td>
        <td><?php echo $row['PROGRAM'] ?></td>
        <td><center><input type="checkbox" name="id[]" class="checkitems" value="<?php echo $row['STUDENT_ID'] ?>"></center></td>
      </tr>
      <?php
    
    
    } mysqli_close($conn);
      ?>
      </form>
    </tbody>
  </table>
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
    <script>
    jQuery(document).ready(function(){
            $('#correct').hide()
            jQuery("#promote").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                var sy =$('#sy').val();
                $.ajax({
                  type: "POST",
                  url: "promote.php",
                  data: formData,
                  success: function(html){
                  if(html=='true' )
                  {
                    $("#correct").slideDown();
                    var delay = 2000;
                    setTimeout(function(){  window.location.href='rms.php?page=candidates&sy='+sy;   }, delay);  
                  }                  }
                });
                  return false;
            
            });
            });
  
</script>
    <script>
        $("#selectall").click(function() 
{   $('.checkitems').prop("checked", $(this).prop("checked"));
});


  </script>


