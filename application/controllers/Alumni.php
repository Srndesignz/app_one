<?php
	class Alumni extends CI_Controller {
		public function __construct() 
		{
			parent :: __construct();
			$this->load->model('Al_model');
			$this->load->helper('url_helper');
		}
		public function enter()
		{
			$this->load->view('templates/al_header');
			$this->load->view('forms/enter');
			$this->load->view('templates/al_footer');
		}
		public function enter_detail() 
		{
			if(!$this->Al_model->enter_detail_db())
				echo 'Email already registered';
			else
				echo 'success';
		}
		public function get_email()
		{
			$search_item = $this->input->post('search_item');
			if($this->Al_model->check_email($search_item))
			{
				echo "Email already registered! Use another one or click <a href='email_err'>here</a>";
			}
		}
		public function load_modal_al()
		{
			$email = $this->input->post('email');
			if(($this->Al_model->check_email($email)))
			{
				$data['alumni'] = $this->Al_model->get_modal_details($email);
				$name = $data['alumni']['name'];
				$passout_year = $data['alumni']['passout_year'];
				$all_qualifications = $data['alumni']['all_qualifications'];
				$work_history = $data['alumni']['work_history'];
				$department = $data['alumni']['department'];
				$blog = $data['alumni']['blog'];
				$email_old = $data['alumni']['email'];
				$phone = $data['alumni']['phone'];
				$photo = $data['alumni']['photo'];

				echo '<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Alumni</h4>
			      </div>
				<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
									<form id="update_form">
									<input type="hidden" id="encoded_email" value="'.$email.'"/>
					<table class="table">
					<tr><td>Name: </td><td><input class="form-control" type="text" id="name" name="name" value="'.$name.'"/></td></tr>
					<tr><td>Passout Year </td><td class="text-center" ><select class="form-control" type="text" id="passout_year">
														<option value="'.$passout_year.'">'.$passout_year.'</option>
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
					<tr><td></td><td><textarea readonly placeholder="" class="form-control" type="text" id="all_qualifications" name="all_qualifications">'.$all_qualifications.'</textarea><a id="clear_qualifications" href="#">Clear</a></td></tr>
					<tr><td>Department: </td><td><select class="form-control" type="text" id="department" name="department">
													<option value="'.$department.'">'.$department.'</option>
													<option value="Computer Science">Computer Science</option>
												    <option value="Electronics and Communications">Electronics and Communications</option>
												    <option value="Electrical and Electronics">Electrical and Electronics</option>
												    <option value="General Engineering">General Engineering</option>
												</select></td></tr>
					<tr><td>Work History</td><td><textarea class="form-control" type="text" id="work_history">'.$work_history.'</textarea></td></tr>
					<tr><td>Website/Blog: </td><td><input value="'.$blog.'"placeholder="Optional" type="text" id="blog" name="blog" class="form-control"/></td></tr>
					<tr><td>Email: </td><td><input value="'.$email_old.'"autocomplete="off" class="form-control" type="text" id="email_old" name="email"/></td><td><div id="email_err"></div></td></tr>
					<tr><td>Phone: </td><td><input value="'.$phone.'"class="form-control" type="text" id="phone" name="phone"/></td></tr>
					<tr><td>Photo: </td><td><input type="file" id="photo" name="photo"/></td></tr>
					<tr><td></td><td><img id="photo_preview" class="img img-responsive" src="'.base_url("uploads/".$photo).'" width="200px"/></td></tr>
					<tr><td></td><td><input class="btn btn-success" id="update_modal_submit" value="Update Details"/></td></tr>
					<input type="hidden" value="'.$email.'" id="original_email"/>
					</table>
				</form></div></div>
								</div>
							</div>
							<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>';
			}
			else
			{
				echo "Email not present";
			}
		}
		public function update_modal_al()
		{
			if($this->Al_model->update_modal_al_db())
			{
				echo "Updated Successfully";
			}
			else
			{
				echo "Not updated";
			}
		}
		public function listing()
		{
			$data['alumni_list'] = $this->Al_model->get_list();
			$this->load->view('templates/al_header');
			$this->load->view('forms/al_list', $data);
			$this->load->view('templates/al_footer');
		}
		public function delete()
		{
			if($this->Al_model->delete_alumni())
			{
				echo "Deleted Successfully";
			}
			else
			{
				echo "Not deleted";
			}
		}
	}