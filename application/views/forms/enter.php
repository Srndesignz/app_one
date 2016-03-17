
<div class="container">
	<div class="row">
		<div class="col-md-12 register-div">
			<div class="row enter-title text-center"><h3><i class="fa fa-edit"></i></h3></div>
			<form>
				<div class="col-md-6">
					<table class="table">
					<tr><td>Name* </td><td><input required class="form-control" type="text" id="name"/></td></tr>
					<tr><td>Passout Year </td><td class="text-center" ><select class="form-control" type="text" id="passout_year">
														<option value="2007">2007</option>
													    <option value="2008">2008</option>
													    <option value="2009">2009</option>
													    <option value="2010">2010</option>
													    <option value="2011">2011</option>
													    <option value="2012">2012</option>
													    <option value="2013">2013</option>
													    <option value="2014">2014</option>
													    <option value="2015">2015</option>
													    <option value="2016">2016</option>
													    <option value="2017">2017</option>
													    <option value="2018">2018</option>
													    <option value="2019">2019</option>
													    <option value="2020">2020</option>
													    <option value="2021">2021</option>
													    <option value="2022">2022</option>
													</select>
												</td>
											</tr>
					<tr><td>Qualification* </td><td class="text-center" >Basic<select class="form-control" type="text" id="basic_qualification">
														<option value="BTech">BTech</option>
													    <option value="MTech">MTech</option>
													    <option value="Phd">Phd</option>
													</select>Specialisation<input class="form-control" type="text" id="specialisation"/>
												<a id="add_qualifications_link" href="#">Add <i class="fa fa-chevron-down"><i></a></td></tr>
					<tr><td></td><td class="text-center"><textarea readonly placeholder="Example:&#10;BTech , MTech Digital Image Processing" class="form-control" type="text" id="all_qualifications"></textarea><a id="clear_qualifications" href="#">Clear</a></td></tr>
					<tr><td>Department </td><td><select class="form-control" type="text" id="department">
													<option value="Computer Science">Computer Science</option>
												    <option value="Electronics and Communications">Electronics and Communications</option>
												    <option value="Electrical and Electronics">Electrical and Electronics</option>
												</select></td></tr>
					<tr><td>Work History</td><td><textarea placeholder="2011-2012: Software Engineer at ABC&#10;2012-present: Developer at XYZ" class="form-control" type="text" id="work_history"></textarea></td></tr>
					</table>
				</div>
				<div class="col-md-6">
					<table class="table">
					<tr><td>Website/Blog </td><td><input placeholder="Optional" type="text" id="blog" class="form-control"/></td></tr>
					<tr><td>Email* </td><td><input required autocomplete="off" class="form-control" type="text" id="email"/></td><td><div id="email_err"></div></td></tr>
					<tr><td>Phone* </td><td><input required class="form-control" type="text" id="phone"/></td></tr>
					<tr><td>Photo </td><td><input class="form-control" type="file" id="photo"/></td></tr>
					<tr><td></td><td><img class="img img-responsive" id="photo_preview" src="<?php echo base_url("assets/css/images/display_avatar.jpg");?>" width="100px"/></td></tr>
					<tr><td></td><td><input class="btn btn-success" id="enter" value="Enter Details"/></td></tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>