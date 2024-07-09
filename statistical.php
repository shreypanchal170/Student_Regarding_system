<?php session_start(); ?>
    <script src="asset/js/Chart.bundle.js"></script>
    <script src="asset/js/utils.js"></script>
    
    <style>
    @media screen{
      #headtext{
      display: none;

    }
    }
    @media print {  
    @page {
      size:8.5in 14in;
      max-width:8.5in;
    }
    #head{
      display: none;
    }
    }
    
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
   
    <div id="head" class="page-header">
      <h1>STUDENTS RECORD STATISTICAL REPORT</h1>
      <span> School Year:<?php echo $_POST['sy'] ?></span>
      <button id="btnprint" style="float:right" class="btn btn-info" onclick="window.print()"><i class="glyphicon glyphicon-print"></i>PRINT</button>
    </div>
    <div id="headtext">
    <div class="col-md-12">
    <table>
  <tr>
    <td style="width:20%;">
      <p style="align:center;text-align:center;"><img src="images/logo.jpg" style="height:50px;width:50px;" alt=""></p>
      <br><br>
    </td>
    <td style="width:800px;font-size:12px;line-height:1mm;text-align:center" >
    <p><b>DOÑA MONTSERRAT LOPEZ MEMORIAL HIGH SCHOOL</b></p>
    <p>Silay City</p>
    <p>Student Record Statistical Report</p>
    <p>(<?php echo $_POST['sy'] ?>)</p> 
    </td>
    <td style="width:20%;">
      <br>
      <?php
      include 'db.php';
      $id = $_GET['id'];
      $sy = $_POST['sy'];
      $user = $_SESSION['ID'];
    mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
    VALUES ('printed Statistical Report of $sy','$user',NOW() )");
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
    </div>
    </div>
  <div id="print">
  <div class="col-lg-12">
  <table style="width: 100%;">
  <tr>
      <td style="width: 20%;">
      </td>

      <td style="width: 60%;">
        <div id="container">
        <canvas id="canvas"></canvas></div>
      </td>
   
      <td style="width: 20%;">
    </tr>
  </table>
    
    <hr></hr>
    <br>
    <table style="width:100%">
      <tr>
        <td style="width: 50%">
          <div id="container">
        <canvas id="canvas1"></canvas></div>
        </td>
        <td style="width: 50%;">
          <div id="container">
        <canvas id="canvas2"></canvas></div>
        </td>
      </tr>
    </table>
     <hr></hr>
    <table style="width:100%">
      <tr>
        <td style="width: 50%;">
          <div id="container">
        <canvas id="canvas3"></canvas></div>
        </td>
        <td style="width: 50%;">
          <div id="container">
        <canvas id="canvas4"></canvas></div>
        </td>
      </tr>
    </table>
    </div>
     <hr></hr>
     </div>
    

    
    

    
    <script>

        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["Grade 7", "Grade 8", "Grade 9", "Grade 10"],
            datasets: [{
                label: 'Retained',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id WHERE ACTION='Retained' And grade = 'Grade 7' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' And grade = 'Grade 8' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' And grade = 'Grade 9' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                   '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' And grade = 'Grade 10' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }, {
                label: 'Promoted',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' And grade = 'Grade 7' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' And grade = 'Grade 8' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                    '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' And grade = 'Grade 9' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                   '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' And grade = 'Grade 10' AND SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }]

        };
         var barChartData1 = {
            labels: ["Promoted", "Retained"],
            datasets: [{
                label: 'Female',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [ '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'FEMALE' And grade = 'Grade 7' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'FEMALE' And grade = 'Grade 7' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }, {
                label: 'Male',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    - '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id WHERE ACTION='Promoted' AND GENDER = 'MALE' And grade = 'Grade 7' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id WHERE ACTION='Retained' AND GENDER = 'MALE' And grade = 'Grade 7' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }]

        };
        var barChartData2 = {
            labels: ["Promoted", "Retained"],
            datasets: [{
                label: 'Female',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [ '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'FEMALE' And grade = 'Grade 8' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'FEMALE' And grade = 'Grade 8' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }, {
                label: 'Male',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    - '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'MALE' And grade = 'Grade 8' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'MALE' And grade = 'Grade 8' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }]

        };

        var barChartData3 = {
            labels: ["Promoted", "Retained"],
            datasets: [{
                label: 'Female',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [ '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'FEMALE' And grade = 'Grade 9' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'FEMALE' And grade = 'Grade 9' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }, {
                label: 'Male',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    - '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'MALE' And grade = 'Grade 9' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'MALE' And grade = 'Grade 9' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }]

        };
        var barChartData4 = {
            labels: ["Promoted", "Retained"],
            datasets: [{
                label: 'Female',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [ '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'FEMALE' And grade = 'Grade 10' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'FEMALE' And grade = 'Grade 10' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }, {
                label: 'Male',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    - '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Promoted' AND GENDER = 'MALE' And grade = 'Grade 10' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>',
                      '<?php
                      include 'db.php';

                      $query = mysqli_query($conn,"SELECT * from student_year_info LEFT JOIN student_info ON student_year_info.STUDENT_ID = student_info.STUDENT_ID left join grade on student_year_info.YEAR=grade.grade_id  WHERE ACTION='Retained' AND GENDER = 'MALE' And grade = 'Grade 10' AND student_year_info.SCHOOL_YEAR='".$_POST['sy']."'");
                      $row = mysqli_num_rows($query);

                       echo $row;
                     ?>'
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Total'
                    }
                }
            });
            var ctx1 = document.getElementById("canvas1").getContext("2d");
            window.myBar1 = new Chart(ctx1, {
                type: 'bar',
                data: barChartData1,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grade 7'
                    }
                }
            });
            var ctx2 = document.getElementById("canvas2").getContext("2d");
            window.myBar2 = new Chart(ctx2, {
                type: 'bar',
                data: barChartData2,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grade 8'
                    }
                }
            });
            var ctx3 = document.getElementById("canvas3").getContext("2d");
            window.myBar3 = new Chart(ctx3, {
                type: 'bar',
                data: barChartData3,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grade 9'
                    }
                }
            });
            var ctx4 = document.getElementById("canvas4").getContext("2d");
            window.myBar4 = new Chart(ctx4, {
                type: 'bar',
                data: barChartData4,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grade 10'
                    }
                }
            });

        };


     
    </script>
    
