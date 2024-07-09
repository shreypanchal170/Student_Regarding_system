  <script>
      $(document).ready(function(){

          $("#new_row").hide();
    $("#new_add").click(function(){
        $("#new_row").clone().appendTo("#t_rows").show();
         $("#new_add").hide()
    });
});
    </script> 

    <?php 

    for($i = 0; $i <1; $i++){
    ?>
 <div id="new_row" class="tr<?php echo $i ?>" >

          <div class="col-xs-4" style="border:1px solid black;height:25px">

           
            <select name="sub[]" onchange="newrow(<?php echo $i ?>)">
            <option></option>
            
            <?php
           $sql4 = mysqli_query($conn, "SELECT * from SUBJECTS WHERE `FOR`='All' or `FOR`='".$_GET['prog']."' ORDER BY SUBJECT_ID");
           while($row4 = mysqli_fetch_assoc($sql4)){
            ?>
            <option value="<?php echo $row4['SUBJECT_ID']?>"><?php echo $row4['SUBJECT'] ?></option>
            <?php
          }
          ?>
              
            </select>

          </div>
          
          <div class="col-xs-4" style="border:1px solid black;width:59px;height:25px;font-size:12px;    padding-left: 5px;">
          <input type="text" style="border-bottom:0px" name="una[]"   onkeyup="ave2(<?php echo $i ?>)" onkeydown="ave2(<?php echo $i?>) " class="grad<?php echo $i ?>">
           
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">
         <input type="text" style="border-bottom:0px" name="duwa[]"   onkeyup="ave2(<?php echo $i ?>)" onkeydown="ave2(<?php echo $i ?>)" class="grad<?php echo $i ?>">       
          </div> 
        <div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">
        <input type="text" style="border-bottom:0px" name="tatlo[]"   onkeyup="ave2(<?php echo $i ?>)" onkeydown="ave2(<?php echo $i ?>)" class="grad<?php echo $i ?>">
         
        </div> 
        <div class="col-xs-4" style="border:1px solid black;width:54px;height:25px;font-size:12px;    padding-left: 5px;">
        <input type="text" style="border-bottom:0px" name="apat[]"   onkeyup="ave2(<?php echo $i ?>)" onkeydown="ave2(<?php echo $i ?>)" class="grad<?php echo $i ?>">
        </div>    
        <div class="col-xs-1 text-center" style="font-size:12px;border:1px solid black;height:25px;padding-left:1px">
        <input type="text" style="border-bottom:0px" name="fin[]" id="fina<?php echo $i ?>"  >
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:25px">
       <input style="border-bottom:0px" type="text" name="unit[]"  >
        </div>
        <div class="col-xs-1 text-center" style="border:1px solid black;height:25px;    padding-left: 2px;text-align:center;font-size:12px;width:100px">
      <input style="border-bottom:0px" type="text" name="act[]" id="act<?php echo $i ?>" >
          
        </div>
         </div>
<?php } ?>
    <?php
     $prog_clause =" `FOR`='All' or `FOR`=" . "'". $_GET['prog'] ."'"; ?>
<script>
  function newrow($i){
    var i = $i + 1;
    data = '<div id="new_row" class="tr'+i +'" >'+

          '<div class="col-xs-4" style="border:1px solid black;height:25px">'+

           
           ' <select name="sub[]" onchange="newrow('+i +')"><option></option>'+
            
          '  <?php
                     $sql4 = mysqli_query($conn, "SELECT * from SUBJECTS WHERE $prog_clause ORDER BY SUBJECT_ID");
                     while($row4 = mysqli_fetch_assoc($sql4)){
                      ?>'+
           ' <option value="<?php echo $row4['SUBJECT_ID']?>"> <?php echo $row4['SUBJECT'] ?></option>'+
           ' <?php
                     }
                     ?>'+
              
           ' </select>'+

         ' </div>'+
          
          '<div class="col-xs-4" style="border:1px solid black;width:59px;height:25px;font-size:12px;    padding-left: 5px;">'+
         ' <input type="text" style="border-bottom:0px" name="una[]"   onkeyup="ave2('+i +')" onkeydown="ave2('+i +') " class="grad'+i +'">'+
           
      '  </div> '+
        '<div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">'+
         '<input type="text" style="border-bottom:0px" name="duwa[]"   onkeyup="ave2('+i +')" onkeydown="ave2('+i +')" class="grad'+i +'"> '+      
         ' </div> '+
       ' <div class="col-xs-4" style="border:1px solid black;width:56px;height:25px;font-size:12px;    padding-left: 5px;">'+
       ' <input type="text" style="border-bottom:0px" name="tatlo[]"   onkeyup="ave2('+i +')" onkeydown="ave2('+i +')" class="grad'+i +'">'+
         
       ' </div> '+
        '<div class="col-xs-4" style="border:1px solid black;width:54px;height:25px;font-size:12px;    padding-left: 5px;">'+
        '<input type="text" style="border-bottom:0px" name="apat[]"   onkeyup="ave2('+i +')" onkeydown="ave2('+i +')" class="grad'+i +'">'+
        '</div>'+    
       ' <div class="col-xs-1 text-center" style="font-size:12px;border:1px solid black;height:25px;padding-left:1px">'+
        '<input type="text" style="border-bottom:0px" name="fin[]" id="fina'+i +'"  >'+
        '</div>'+
        '<div class="col-xs-1 text-center" style="border:1px solid black;height:25px">'+
       '<input style="border-bottom:0px" type="text" name="unit[]"  >'+
       ' </div>'+
        '<div class="col-xs-1 text-center" style="border:1px solid black;height:25px;    padding-left: 2px;text-align:center;font-size:12px;width:100px">'+
     ' <input style="border-bottom:0px" type="text" name="act[]" id="act'+i +'" >'+
          
       ' </div>'+
        ' </div>';
        $('#t_rows').append(data);
  }
</script>
 
   