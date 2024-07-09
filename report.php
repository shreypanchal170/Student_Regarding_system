


          <h1 class="page-header">Search Student Records</h1>

          <div class="container">
            <div class="col-sm-3">
        <div class="input-group">
    </div>
    </div>

       <div class="col-md-12"> 
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>
        </div> 
        <div class="panel-body">  
  <table id="students" class="table table-bordered">
    <thead>
      <tr id="heads">
        <th style="width:10%">LRN NO.</th>
        <th style="width:20%">Name</th>
        <th style="width:10%">Gender</th>
        <th style="width:10%">Curriculum</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info ");
    while($row = mysqli_fetch_assoc($sql)) {
       $sql2=  mysqli_query($conn, "SELECT * FROM program WHERE PROGRAM_ID = '".$row['PROGRAM']."' ");
         while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        <td><?php echo $row['GENDER'] ?></td>
        <td><?php echo $row2['PROGRAM'] ?></td>
        <td><a class="btn btn-info" onclick='window.open("form137.php?id=<?php echo $row['STUDENT_ID'] ?>")'><i class="fa fa-fw fa-print"></i>Printable Report</a></td>
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

    </div>


     <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>

