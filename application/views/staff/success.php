<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr><td>Name</td><td><?php echo $details['name'];?></td></tr>
				<tr><td>Qualification</td><td><?php echo $details['qualifications'];?></td></tr>
				<tr><td>Department</td><td><?php echo $details['department'];?></td></tr>
				<tr><td>Designation</td><td><?php echo $details['designation'];?></td></tr>
				<tr><td>Teaching Experience</td><td><?php echo $details['teaching_experience'];?></td></tr>
				<tr><td>Industrial Experience</td><td><?php echo $details['industrial_experience'];?></td></tr>
				<tr><td>Other Experience</td><td><?php echo $details['other_experience'];?></td></tr>
				<tr><td>Papers Published</td><td><?php echo $details['papers_published'];?></td></tr>
				<tr><td>Patents</td><td><?php echo $details['patents'];?></td></tr>
				<tr><td>Blog/Website</td><td><?php echo $details['blog'];?></td></tr>
				<tr><td>Email</td><td><?php echo $details['email'];?></td></tr>
				tr><td>Address</td><td><?php echo $details['address'];?></td></tr>
				<tr><td>Phone</td><td><?php echo $details['phone'];?></td></tr>
				<tr><td>Photo</td><td><img class="img img-responsive" width="200px" src="<?php echo base_url("uploads/".$details['photo']);?>"/></td></tr>
			</table>
		</div>
	</div>
</div>