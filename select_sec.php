<!-- Modal -->
<div class="modal fade" id="modal<?php echo $modal; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Curriculum</h4>
      </div>
      <div class="modal-body">
			<div class="list-group">
      <?php foreach($system->grade_list() as $row){ $grade=$row['grade_id'];?>
       <li>
         <a id=demo1 href="javascript:;" data-toggle="collapse" data-target="#demo_<?php echo $row['grade_id'] ?>"><i class="fa fa-fw fa-files-o"></i> <?php echo $row['grade'] ?> <i class="fa fa-fw fa-caret-down"></i></a>
         <ul id="demo_<?php echo $row['grade_id'] ?>" class="collapse">
            
            <?php 
            foreach($system->grade_section_list($grade) as $row1){
          ?>
          <li style="background-color:black">
            <a href="rms.php?page=Students"><i class="fa fa"></i><?php echo $row1['section_name'] ?></a>
            </li>
            <?php } ?>
        </ul>
      </li>
			<?php } ?>				
								

			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
