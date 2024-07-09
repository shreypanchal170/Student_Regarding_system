 
          <h1 class="page-header">History Logs</h1>

       <div class="col-md-12">   
      
       <div class="row">
       	<table id="log">
       		<thead>
       		<tr style="border-bottom:1px solid black">
       			<td width="20%"><center>Date/Time</center></td>
       			<td width="50%"></td>
       		</tr>
       		</thead>
       		<tbody style="line-height:10mm" id="log_table">
       		<?php include 'all_logs.php' ?>
       		</tbody>
       	</table>
       </div>
</div>
<script>
	function search_log(){

		var st = $('#search').val();
		if(st == ''){
		$.ajax({
			url:'all_logs.php',
			success:function(html){
				$('#log_table').html(html);
			}
		});
	}else{
		$.ajax({
			url:'search_log.php?st='+st,
			success:function(html){
				if(st == ''){
					$('#log_table').html('');
				}
				if(html == ''){
				$('#log_table').html('No Result!');
				}else{
				$('#log_table').html(html);
			}
			}
		});
	}
	}
</script>
<script type="text/javascript">
        $(function() {
            $("#log").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
 

