	<div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header">
            	Dashboard <small>admin area</small>
           	</h1>
            <ol class="breadcrumb">
            	<li class="active">
                	<i class="fa fa-dashboard"></i> Edit/Delete
            	</li>
        	</ol>
    	</div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr><th>No</th><th>Name</th><th>Email</th><th>Phone</th><th>Photo</th><th>Action</th></tr>
				<?php
				$i = 1;
				foreach($staff_list as $staff)
				{
					$enc_email = rtrim(base64_encode($staff['email']),'=');
					?>
					<tr>
						<td><?php echo $i;?></td><td><?php echo $staff['name'];?></td><td><?php echo $staff['email'];?></td>
						<td><?php echo $staff['phone'];?></td><td><img src="<?php echo base_url("uploads/".$staff['photo']);?>" width="100px"/></td>
						<td><a data-toggle="modal" data-target="#staff_modal" href="#" id="edit_staff_link" data-value="<?php echo $enc_email;?>" class="btn btn-success">EDIT</a>
							<a data-value="<?php echo $enc_email;?>" id="delete_staff_link" href="#" class="btn btn-danger">DELETE</a></td>
					</tr>
					<?php
					$i++;
				}
				?>
			</table>
		</div>
	</div>
	<div id="staff_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Staff</h4>
	      </div>
	      <div class="modal-body">
	        <p>Some text in the modal.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>