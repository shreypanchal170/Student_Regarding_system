   <?php
             include 'db.php';
             $id=$_GET['id'];
             $qur=mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID='$id'");
             $r=mysqli_fetch_assoc($qur);
             $rr=$r['PROGRAM'];
             $sql=mysqli_query($conn,"SELECT * from subjects where `FOR` = '$rr'");
             
             ?>
             <select name="subject">
             <?php while($su=mysqli_fetch_assoc($sql)){ ?>
               <option value=""><?php echo $su['SUBJECT'] ?></option>
               <?php } ?>
             </select>
             <?php mysqli_close($conn); ?>