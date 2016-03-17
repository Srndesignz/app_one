<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr><th>No</th><th>Name</th><th>Email</th><th>Phone</th><th>Photo</th><th>Action</th></tr>
				<?php
				$i = 1;
				foreach($alumni_list as $alumni)
				{
					if($alumni['photo'] == '')
					{
						$image_src = base_url("assets/css/images/no_image.jpg");
					}
					else
					{
						$image_src = base_url("uploads/".$alumni['photo']);
					}
					//$enc_email = rtrim(base64_encode($alumni['email']),'=');
					?>
					<tr>
						<td><?php echo $i;?></td><td><?php echo $alumni['name'];?></td><td><?php echo $alumni['email'];?></td>
						<td><?php echo $alumni['phone'];?></td><td><img src="<?php echo $image_src;?>" width="100px"/></td>
						<td><a data-toggle="modal" data-target="#edit_modal_al" href="#" id="edit_alumni_link" data-email="<?php echo $alumni['email'];?>" class="btn btn-success">EDIT</a>
							<a data-email="<?php echo $alumni['email'];?>" id="delete_alumni_link" href="#" class="btn btn-danger">DELETE</a></td>
					</tr>
					<?php
					$i++;
				}
				?>
			</table>
		</div>
	</div>
	<div id="alumni_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">alumni</h4>
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

</div>