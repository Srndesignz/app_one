<div class="container-fluid">
	<div class="row update-details-row subheader text-center">
		<h2> Welcome <?php echo $staff['name'];?>, </h2>
		<h3 class="text-center"><i class="fa fa-pencil"></i>Update Your Details</h3>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 register-div">
			<?php 
			$enc = rtrim(base64_encode($staff['email']),'=');
			echo validation_errors();
			?>
			<div class="col-md-6">
			<table class="table">
				<?php 
				$attributes = array("id" => "update_form");
				echo form_open_multipart('staff/update/'.$enc, $attributes);?>
					<tr><td>Name: </td><td><input required class="form-control" type="text" id="name" name="name" value="<?php echo $staff['name'];?>"/></td></tr>
					<tr><td>Qualification: </td><td>Basic<select class="form-control" type="text" id="basic_qualification" name="basic_qualification">
														<option value="BTech">BTech</option>
													    <option value="BE">BE</option>
													    <option value="Bsc">Bsc</option>
													    <option value="Msc">Msc</option>
													    <option value="MPhil">MPhil</option>
													    <option value="MTech">MTech</option>
													    <option value="ME">ME</option>
													    <option value="Phd">Phd</option>
													</select>Specialisation<input class="form-control" type="text" id="specialisation" name="specialisation"/>
												<a id="add_qualifications_link" href="#">Add</a></td></tr>
					<tr><td></td><td><textarea readonly placeholder="" class="form-control" type="text" id="all_qualifications" name="all_qualifications"><?php echo $staff['qualifications'];?></textarea><a id="clear_qualifications" href="#">Clear</a></td></tr>
					<tr><td>Department: </td><td><select class="form-control" type="text" id="department" name="department" required>
													<option></option>
													<option value="Computer Science">Computer Science</option>
												    <option value="Electronics and Communications">Electronics and Communications</option>
												    <option value="Electrical and Electronics">Electrical and Electronics</option>
												</select></td></tr>
					<tr><td>Designation: </td><td><select class="form-control" type="text" id="designation" name="designation" required>
													<option></option>
													<option value="Assistant Professor">Assistant Professor</option>
												    <option value="Associate Professor">Associate Professor</option>
												</select></td></tr>
					<tr><td>Home Address: </td><td><textarea required class="form-control" value="<?php echo $staff['address'];?>" type="text" id="address" name="address"></textarea></td></tr>
					</table>
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr><td>Teaching Experience: </td><td><input class="form-control" type="text" id="teaching_experience" name="teaching_experience" value="<?php echo $staff['teaching_experience'];?>"/></td></tr>
						<tr><td>Industrial Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="industrial_experience" name="industrial_experience"><?php echo $staff['industrial_experience'];?></textarea></td></tr>
						<tr><td>Other Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="other_experience" name="other_experience"><?php echo $staff['other_experience'];?></textarea></td></tr>
						<tr><td>Papers Published: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="papers_published" name="papers_published"><?php echo $staff['papers_published'];?></textarea></td></tr>
						<tr><td>Patents: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="patents" name="patents"><?php echo $staff['patents'];?></textarea></td></tr>
						<tr><td>Website/Blog: </td><td><input placeholder="Optional" type="text" id="blog" name="blog" value="<?php echo $staff['blog'];?>"class="form-control"/></td></tr>
						<tr><td>Email: </td><td><input required class="form-control" type="text" id="email" name="email" value="<?php echo $staff['email'];?>"/></td></tr>
						<tr><td>Phone: </td><td><input required class="form-control" type="text" id="phone" name="phone" value="<?php echo $staff['phone'];?>"/></td></tr>
						<tr><td>Photo: </td><td><input type="file" id="photo" name="photo"/></td></tr>
						<tr><td></td><td><img class="img img-responsive" id="photo_preview" src="<?php echo base_url("uploads/".$staff["photo"]);?>" width="200px"/></td></tr>
						<tr><td></td>
							<td>
								<input class="btn btn-success" type="submit" name="submit" value="Update Details"/>
								<a class="btn btn-warning" href="<?php echo base_url("index.php/staff/enter");?>">Cancel</a>
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>
	</div>
</div>